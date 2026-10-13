<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactPhone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactPhone>
 */
class ContactPhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contact_id' => Contact::factory(),
            'international_code' => '+1',
            'phone_number' => fake()->numerify('##########'),
            'main' => false,
        ];
    }

    /**
     * Indicate that this is the main phone.
     */
    public function main(): static
    {
        return $this->state(fn (array $attributes) => [
            'main' => true,
        ]);
    }
}
