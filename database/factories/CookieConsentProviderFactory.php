<?php

namespace Database\Factories;

use App\Models\CookieConsentProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CookieConsentProvider>
 */
class CookieConsentProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->domainName,
            'url' => $this->faker->url,
        ];
    }
}
