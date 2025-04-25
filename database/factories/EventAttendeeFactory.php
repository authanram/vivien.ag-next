<?php

namespace Database\Factories;

use App\Enums\Salutation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventA>
 */
class EventAttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'salutation' => $this->faker->randomElement([array_column(Salutation::cases(), 'value')]),
            'firstname' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'attendance' => $this->faker->randomElement([1, 2, 4]),
            'message' => $this->faker->sentence,
        ];
    }
}
