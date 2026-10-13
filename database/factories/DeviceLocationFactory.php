<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\DeviceLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DeviceLocation>
 */
class DeviceLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'device_id' => Device::factory(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'accuracy' => fake()->randomFloat(2, 1, 100),
            'recorded_at' => now(),
        ];
    }
}
