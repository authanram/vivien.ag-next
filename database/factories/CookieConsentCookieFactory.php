<?php

namespace Database\Factories;

use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CookieConsentCookie>
 */
class CookieConsentCookieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cookie_name' => $this->faker->unique()->slug(2),
            'cookie_consent_provider_id' => CookieConsentProvider::factory(),
            'cookie_purpose' => $this->faker->sentence,
            'cookie_category' => 'Notwendig',
            'cookie_type' => 'HTTP',
            'cookie_lifetime' => $this->faker->numberBetween(0, 365),
            'encrypted' => $this->faker->boolean,
            'required' => $this->faker->boolean,
        ];
    }
}
