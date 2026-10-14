<?php

namespace Tests\Feature;

use App\Models\Emergency;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmergencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_emergency_is_created_with_geolocation(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/emergencies', ['message' => 'Help!', 'latitude' => -23.55052, 'longitude' => -46.633308])
            ->assertCreated()
            ->assertJsonPath('data.message', 'Help!')
            ->assertJsonPath('data.status', Emergency::STATUS_ACTIVE);

        $this->assertDatabaseHas('emergencies', ['user_id' => $user->id, 'message' => 'Help!']);
    }

    public function test_emergency_is_created_without_geolocation(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/emergencies', ['message' => 'Help!'])
            ->assertCreated()
            ->assertJsonPath('data.latitude', null)
            ->assertJsonPath('data.longitude', null);
    }

    public function test_user_id_and_status_in_payload_are_ignored(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/emergencies', ['message' => 'Help!', 'user_id' => $other->id, 'status' => 9])
            ->assertCreated();

        $this->assertDatabaseHas('emergencies', ['user_id' => $user->id, 'status' => Emergency::STATUS_ACTIVE]);
    }

    public function test_payload_is_validated(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'sanctum')
            ->postJson('/api/emergencies', ['latitude' => 91])
            ->assertJsonValidationErrors(['message', 'latitude', 'longitude']);
    }

    public function test_guests_cannot_create_emergencies(): void
    {
        $this->postJson('/api/emergencies', ['message' => 'Help!'])->assertUnauthorized();
    }
}
