<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventLocation>
 */
class EventLocationFactory extends Factory
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
            'name' => $this->faker->randomElement(['Jägerstraße 26, Spielberg', 'Kloster Kirchberg', 'In der Natur']),
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'url' => $this->faker->url,
        ];
    }
}
