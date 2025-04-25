<?php

namespace Database\Factories;

use App\Enums\Color;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
            'value' => $this->faker->unique()->randomElement([
                'Drinnen',
                'Draußen',
                '2h+',
                '4h+',
                '24h+',
                'Übernachtung/en',
                'Reise',
                'Schreiben',
                'Lesen',
                'Malen',
                'Für Frauen',
                'Für Paare',
                'Abends',
                'Nachts',
                'Ausland',
            ])
        ];
    }
}
