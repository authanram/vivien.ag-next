<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ImageCoordinates;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['file' => 'Herzen.jpeg', 'coords' => ['top' => 7, 'left' => -180, 'height' => 277.7, 'rotate' => 0, 'zindex' => 1, 'position' => 'left', 'rotate_x' => 7, 'rotate_y' => 15, 'perspective' => 500]],
            ['file' => 'Nachdenken-bedeutet-Staerke.jpeg', 'coords' => ['top' => 280, 'left' => -119, 'height' => 177.7, 'rotate' => 0, 'zindex' => 2, 'position' => 'left', 'rotate_x' => 7, 'rotate_y' => 17, 'perspective' => 1000]],
            ['file' => 'Kopfkino.jpeg', 'coords' => ['top' => 307, 'left' => -214, 'height' => 147.77, 'rotate' => 3, 'zindex' => 3, 'position' => 'left', 'rotate_x' => 7, 'rotate_y' => -27, 'perspective' => 400]],
            ['file' => 'Kirkegaard.jpeg', 'coords' => ['top' => 459, 'left' => -150, 'height' => 217, 'rotate' => 7, 'zindex' => 2, 'position' => 'left', 'rotate_x' => 0, 'rotate_y' => 0, 'perspective' => 500]],
            ['file' => 'Blumen.jpeg', 'coords' => ['top' => 659, 'left' => -77, 'height' => 117, 'rotate' => -7, 'zindex' => 3, 'position' => 'left', 'rotate_x' => 0, 'rotate_y' => 20, 'perspective' => 1000]],
            ['file' => 'Bunt.jpeg', 'coords' => ['top' => 672, 'left' => -152, 'height' => 97, 'rotate' => 3, 'zindex' => 3, 'position' => 'left', 'rotate_x' => 0, 'rotate_y' => -23, 'perspective' => 700]],
            ['file' => 'Frau.jpeg', 'coords' => ['top' => 772, 'left' => -119, 'height' => 177.7, 'rotate' => 0, 'zindex' => 4, 'position' => 'left', 'rotate_x' => 7, 'rotate_y' => 17, 'perspective' => 500]],
        ];

        foreach ($images as $index => $entry) {
            $title = Str::of($entry['file'])
                ->beforeLast('.')
                ->replace('-', ' ')
                ->title()
                ->toString();

            $image = Image::create([
                'uuid' => Str::uuid(),
                'title' => $title,
                'published' => true,
            ]);

            $image->addMedia(storage_path("app/private/gallery-images/{$entry['file']}"))
                ->preservingOriginal()
                ->toMediaCollection('image');

            ImageCoordinates::create([
                'uuid' => Str::uuid(),
                'image_id' => $image->id,
                'active' => true,
                'order_column' => $index + 1,
                ...$entry['coords'],
            ]);
        }
    }
}
