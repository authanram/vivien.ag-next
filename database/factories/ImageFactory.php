<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Event>
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
            'name' => $this->faker->randomElement([$this->faker->word, implode(' ', $this->faker->words(2)), implode(' ', $this->faker->words())]),
            'description' => $this->faker->text,
            'price' => $this->faker->randomElement([10000, 17700, 7700, 25000, 45000, 190000]),
            'order_column' => 1,
            'published' => $this->faker->boolean,
        ];
    }
}
