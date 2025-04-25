<?php

namespace Database\Factories;

use App\Enums\Color;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventType>
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
//            'tags' => [
//                Tag::factory()->create()->id,
//                Tag::factory()->create()->id,
//                Tag::factory()->create()->id,
//            ],
        ];
    }
}
