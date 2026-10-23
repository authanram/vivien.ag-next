<?php

namespace Database\Factories;

use App\Enums\Salutation;
use App\Models\EventAttendee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<EventAttendee>
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
            'salutation' => $this->faker->randomElement(Salutation::cases())->value,
            'firstname' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'attendance' => $this->faker->randomElement([1, 2, 4]),
            'confirmed' => $this->faker->boolean(80),
            'message' => $this->faker->sentence,
        ];
    }
}
