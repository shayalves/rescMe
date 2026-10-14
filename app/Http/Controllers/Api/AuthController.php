<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoogleLoginRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Device;
use App\Models\User;
use App\Services\GoogleTokenVerifier;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        [$token, $device] = $this->issueSessionToken($user, $request);

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'device' => $device,
            'user' => $user,
        ]);
    }

    /**
     * Authenticate (or register) a user with a Google ID token and return a session token.
     */
    public function google(GoogleLoginRequest $request, GoogleTokenVerifier $verifier): JsonResponse
    {
        $payload = $verifier->verify($request->validated('token'));

        if (! $payload || empty($payload['sub']) || empty($payload['email']) || ($payload['email_verified'] ?? false) !== true) {
            return response()->json([
                'message' => 'Invalid Google token',
            ], 401);
        }

        $user = User::where('google_id', $payload['sub'])->first()
            ?? User::where('email', $payload['email'])->first();

        if ($user && $user->google_id && $user->google_id !== $payload['sub']) {
            return response()->json([
                'message' => 'Email is linked to another Google account',
            ], 409);
        }

        if (! $user) {
            $user = new User([
                'name' => $payload['name'] ?? $payload['email'],
                'email' => $payload['email'],
                'password' => Str::random(40),
            ]);
            $user->email_verified_at = Carbon::now();
        }

        $user->google_id = $payload['sub'];
        $user->save();

        [$token, $device] = $this->issueSessionToken($user, $request);

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'device' => $device,
            'user' => $user,
        ]);
    }

    /**
     * Register the device and create a Sanctum session token for it.
     *
     * @return array{0: string, 1: Device}
     */
    private function issueSessionToken(User $user, FormRequest $request): array
    {
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

        return [$token, $device];
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
