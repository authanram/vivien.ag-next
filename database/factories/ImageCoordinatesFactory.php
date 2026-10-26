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
            'active' => $this->faker->boolean(80),
            'position' => $this->faker->randomElement(['left', 'right']),
            'top' => $this->faker->numberBetween(0, 1000),
            'left' => $this->faker->numberBetween(-250, 0),
            'height' => $this->faker->randomFloat(1, 50, 300),
            'rotate' => $this->faker->numberBetween(-10, 10),
            'rotate_x' => $this->faker->numberBetween(-30, 30),
            'rotate_y' => $this->faker->numberBetween(-30, 30),
            'perspective' => $this->faker->numberBetween(0, 1000),
            'zindex' => $this->faker->numberBetween(1, 25),
            'order_column' => $this->faker->numberBetween(1, 25),
        ];
    }
}
