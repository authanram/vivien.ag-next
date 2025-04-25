<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class ImageFactory extends Factory
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
            'name' => $this->faker->randomElement([$this->faker->word, $this->faker->words(2), $this->faker->words()]),
            'description' => $this->faker->text,
            'price' => $this->faker->randomElement([10000, 17700, 7700, 25000, 45000, 190000]),
            'order_column' => 1,
            'published' => $this->faker->boolean,
        ];
    }
}
