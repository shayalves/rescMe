<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    /**
     * Authenticate a user and return a token.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Determine token expiration based on configurable default (e.g., "3M" for three months).
        // Retrieve the default expiration setting (e.g., "3M" for three months).
        $defaultExpiration = config('app.session_default_expiration');
        // Fallback to three months if the format is invalid.
        $expiresAt = Carbon::now();
        if (preg_match('/^(\\d+)([MDY])$/', $defaultExpiration, $matches)) {
            $value = (int) $matches[1];
            $unit = $matches[2];
            switch ($unit) {
                case 'M':
                    $expiresAt = Carbon::now()->addMonths($value);
                    break;
                case 'D':
                    $expiresAt = Carbon::now()->addDays($value);
                    break;
                case 'Y':
                    $expiresAt = Carbon::now()->addYears($value);
                    break;
            }
        }

        // Register (or refresh) the device before issuing the session token.
        $device = $user->devices()->updateOrCreate(
            [
                'brand' => $request->validated('brand'),
                'model' => $request->validated('model'),
                'kernel_version' => $request->validated('kernel_version'),
            ],
            [
                'public_ip' => $request->ip(),
                'last_login_at' => Carbon::now(),
            ],
        );

        // Create token with default abilities and the calculated expiration, linked to the device.
        $newToken = $user->createToken('android-app', ['*'], $expiresAt);
        $newToken->accessToken->forceFill(['device_id' => $device->id])->save();
        $token = $newToken->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'device' => $device,
            'user' => $user,
        ]);
    }

    /**
     * Revoke the current token.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    /**
     * Return the authenticated user's information.
     */
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
