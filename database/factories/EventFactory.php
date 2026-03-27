<?php

namespace Database\Factories;

use App\Enums\Catering;
use App\Enums\EventLocation;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Event>
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
            'price' => $this->faker->randomElement([null, 0, 500, 1000, 1500, 2000, 2500, 3500, 4500]),
            'price_note' => $this->faker->randomElement(['Inkl. Catering', 'Inkl. Getränke', 'Vesper inkl.', null]),
            'event_location' => $this->faker->randomElement(EventLocation::cases()),
            'custom_event_location' => null,
            'catering' => $this->faker->randomElements(collect(Catering::cases())->map->value->toArray(), rand(0, 3)),
            'lead' => 'Sybille Seuffer',
            'published' => $this->faker->boolean,
        ];
    }
}
