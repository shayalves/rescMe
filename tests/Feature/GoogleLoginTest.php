<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\GoogleTokenVerifier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoogleLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, string>
     */
    private function payload(): array
    {
        return [
            'token' => 'google-id-token',
            'brand' => 'Google',
            'model' => 'Pixel',
            'kernel_version' => '6.1',
        ];
    }

    private function fakeGoogle(?array $result): void
    {
        $this->mock(GoogleTokenVerifier::class)
            ->shouldReceive('verify')
            ->with('google-id-token')
            ->andReturn($result);
    }

    public function test_it_registers_a_new_user_from_a_google_token(): void
    {
        $this->fakeGoogle(['sub' => 'g-1', 'email' => 'new@example.com', 'email_verified' => true, 'name' => 'New User']);

        $this->postJson('/api/user/login/google', $this->payload())
            ->assertOk()
            ->assertJsonStructure(['message', 'token', 'device', 'user'])
            ->assertJsonPath('user.email', 'new@example.com');

        $this->assertDatabaseHas('users', ['email' => 'new@example.com', 'google_id' => 'g-1', 'name' => 'New User']);
    }

    public function test_it_links_google_to_an_existing_user_by_email(): void
    {
        $user = User::factory()->create(['email' => 'old@example.com']);
        $this->fakeGoogle(['sub' => 'g-2', 'email' => 'old@example.com', 'email_verified' => true, 'name' => 'Old']);

        $this->postJson('/api/user/login/google', $this->payload())->assertOk();

        $this->assertSame('g-2', $user->fresh()->google_id);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_it_rejects_an_invalid_google_token(): void
    {
        $this->fakeGoogle(null);

        $this->postJson('/api/user/login/google', $this->payload())->assertUnauthorized();
    }

    public function test_it_rejects_an_unverified_google_email(): void
    {
        $this->fakeGoogle(['sub' => 'g-3', 'email' => 'x@example.com', 'email_verified' => false]);

        $this->postJson('/api/user/login/google', $this->payload())->assertUnauthorized();
        $this->assertDatabaseCount('users', 0);
    }
}
