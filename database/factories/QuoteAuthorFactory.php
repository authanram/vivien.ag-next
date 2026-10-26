<?php

namespace Database\Factories;

use App\Models\QuoteAuthor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<QuoteAuthor>
 */
class QuoteAuthorFactory extends Factory
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
            'name' => $this->faker->name,
            'occupation' => $this->faker->randomElement(['Author', 'Writer', 'Scientist', 'Philosopher']),
            'url' => $this->faker->url,
        ];
    }
}
