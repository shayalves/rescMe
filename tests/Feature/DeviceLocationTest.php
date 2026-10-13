<?php

namespace Tests\Feature;

use App\Models\Device;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceLocationTest extends TestCase
{
    use RefreshDatabase;

    public function test_location_is_stored_for_the_device_of_the_current_session(): void
    {
        $user = User::factory()->create();
        $device = Device::factory()->for($user)->create();
        $otherDevice = Device::factory()->for($user)->create();

        $token = $user->createToken('android-app');
        $token->accessToken->forceFill(['device_id' => $device->id])->save();

        $this->withToken($token->plainTextToken)
            ->postJson('/api/device/locations', ['latitude' => -23.55052, 'longitude' => -46.633308, 'accuracy' => 12.5])
            ->assertCreated()
            ->assertJsonPath('data.device_id', $device->id);

        $this->assertDatabaseCount('device_locations', 1);
        $this->assertSame(1, $device->locations()->count());
        $this->assertSame(0, $otherDevice->locations()->count());
    }

    public function test_device_id_in_payload_is_ignored(): void
    {
        $user = User::factory()->create();
        $device = Device::factory()->for($user)->create();
        $foreign = Device::factory()->create();

        $token = $user->createToken('android-app');
        $token->accessToken->forceFill(['device_id' => $device->id])->save();

        $this->withToken($token->plainTextToken)
            ->postJson('/api/device/locations', ['device_id' => $foreign->id, 'latitude' => 1, 'longitude' => 2])
            ->assertCreated();

        $this->assertSame(0, $foreign->locations()->count());
        $this->assertSame(1, $device->locations()->count());
    }

    public function test_session_without_device_is_rejected(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('android-app');

        $this->withToken($token->plainTextToken)
            ->postJson('/api/device/locations', ['latitude' => 1, 'longitude' => 2])
            ->assertUnprocessable();
    }

    public function test_coordinates_are_validated(): void
    {
        $user = User::factory()->create();
        $device = Device::factory()->for($user)->create();
        $token = $user->createToken('android-app');
        $token->accessToken->forceFill(['device_id' => $device->id])->save();

        $this->withToken($token->plainTextToken)
            ->postJson('/api/device/locations', ['latitude' => 91, 'longitude' => 181])
            ->assertJsonValidationErrors(['latitude', 'longitude']);
    }

    public function test_guests_cannot_store_locations(): void
    {
        $this->postJson('/api/device/locations', ['latitude' => 1, 'longitude' => 2])
            ->assertUnauthorized();
    }
}
