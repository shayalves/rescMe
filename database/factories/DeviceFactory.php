<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'model' => fake()->bothify('Model-##??'),
            'brand' => fake()->company(),
            'kernel_version' => fake()->numerify('#.#.##-android##'),
            'public_ip' => fake()->ipv4(),
            'last_login_at' => now(),
        ];
    }
}
