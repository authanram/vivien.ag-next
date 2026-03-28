<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\ImageCoordinates;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<ImageCoordinates>
 */
class ImageCoordinatesFactory extends Factory
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
            'image_id' => Image::factory(),
            'coordinates' => ['x' => $this->faker->randomFloat(), 'y' => $this->faker->randomFloat()],
        ];
    }
}
