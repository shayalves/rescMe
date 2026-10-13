<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactEmail>
 */
class ContactEmailFactory extends Factory
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
            'email' => fake()->safeEmail(),
            'main' => false,
        ];
    }

    /**
     * Indicate that this is the main email.
     */
    public function main(): static
    {
        return $this->state(fn (array $attributes) => [
            'main' => true,
        ]);
    }
}
