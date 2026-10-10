<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_a_new_user(): void
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/user/register', $payload);

        $response->assertStatus(201)
                  ->assertJsonStructure([
                      'message',
                      'user' => ['id', 'name', 'email'],
                  ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function it_logs_in_a_user_and_returns_token(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('secret123'),
        ]);

        $payload = [
            'email' => $user->email,
            'password' => 'secret123',
        ];

        $response = $this->postJson('/user/login', $payload);

        $response->assertStatus(200)
                  ->assertJsonStructure([
                      'message',
                      'token',
                      'user' => ['id', 'name', 'email'],
                  ]);
    }

    /** @test */
    public function it_fails_login_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('secret123'),
        ]);

        $payload = [
            'email' => $user->email,
            'password' => 'wrongpass',
        ];

        $response = $this->postJson('/user/login', $payload);

        $response->assertStatus(401)
                  ->assertJson([
                      'message' => 'Invalid credentials',
                  ]);
    }

    /** @test */
    public function it_logs_out_the_authenticated_user(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('android-app')->plainTextToken;

        $response = $this->withHeaders([
                'Authorization' => "Bearer {$token}",
            ])->postJson('/user/logout');

        $response->assertStatus(200)
                  ->assertJson([
                      'message' => 'Logged out successfully',
                  ]);
    }

    /** @test */
    public function it_returns_authenticated_user_info(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('android-app')->plainTextToken;

        $response = $this->withHeaders([
                'Authorization' => "Bearer {$token}",
            ])->getJson('/user/me');

        $response->assertStatus(200)
                  ->assertJsonStructure([
                      'user' => ['id', 'name', 'email'],
                  ]);
    }
}