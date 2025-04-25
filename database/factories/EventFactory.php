<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateFrom = Carbon::now()->addDays(rand(1, 365));

        return [
            'uuid' => Str::uuid(),
            'description' => $this->faker->text,
            'date_from' => $dateFrom,
            'date_to' => $dateFrom->copy()->addHours($this->faker->randomElement([2, 4, 6])),
            'maximum_attendees' => $this->faker->randomElement([2, 4, 5, 7]),
            'reserved_seats' => 1,
            'price' => $this->faker->randomElement([2000, 45000, 70000, 90000]),
            'price_note' => $this->faker->randomElement(['Inkl. Catering', 'Inkl. Getränke', 'Vesper inkl.', null]),
            'catering' => $this->faker->randomElement(['Robis Catering', null]),
            'lead' => 'Sybille Seuffer',
            'published' => $this->faker->boolean,
        ];
    }
}
