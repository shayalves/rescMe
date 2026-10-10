<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

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
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
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

        // Create token with default abilities and the calculated expiration.
        $newToken = $user->createToken('android-app', ['*'], $expiresAt);
        $token = $newToken->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
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
