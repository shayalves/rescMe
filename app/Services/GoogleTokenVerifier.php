<?php

namespace App\Services;

use Google\Client;

class GoogleTokenVerifier
{
    /**
     * Verify a Google ID token and return its payload, or null when invalid.
     *
     * @return array{sub: string, email: string, email_verified?: bool, name?: string}|null
     */
    public function verify(string $idToken): ?array
    {
        $client = new Client(['client_id' => config('services.google.client_id')]);

        try {
            $payload = $client->verifyIdToken($idToken);
        } catch (\Throwable) {
            return null;
        }

        return is_array($payload) ? $payload : null;
    }
}
