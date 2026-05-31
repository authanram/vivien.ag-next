<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\QuoteAuthor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Quote>
 */
class QuoteFactory extends Factory
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
            'quote_author_id' => QuoteAuthor::factory(),
            'body' => $this->faker->text,
        ];
    }
}
