<?php

namespace Database\Factories;

use App\Enums\Color;
use App\Models\EventType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<EventType>
 */
class EventTypeFactory extends Factory
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
            'color' => $this->faker->randomElement(array_column(Color::cases(), 'value')),
            'name' => $this->faker->randomElement(['Schreibwerkstatt', 'Malwerkstatt', 'Paargruppe', 'Frauengruppe', 'Schreibreise']),
            'description' => $this->faker->text,
        ];
    }
}
