<?php

use Illuminate\Database\Seeder;

class ImageCoordsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('image_coords')->delete();
        
        \DB::table('image_coords')->insert([
		    [
		        'coords' => '{"top": 7, "left": -180, "active": true, "height": 277.7, "rotate": 0, "zindex": 1, "position": "left", "rotate_x": 7, "rotate_y": 15, "perspective": 500, "order_column": 1}',
		        'created_at' => '2020-05-26 01:08:33',
		        'id' => 1,
		        'image_id' => 1,
		        'order_column' => 1,
		        'updated_at' => '2020-05-26 01:08:33',
		        'uuid' => '12ecc532-8e01-4bd3-97ea-1a7948563062',
		    ],
		    [
		        'coords' => '{"top": 280, "left": -119, "active": true, "height": 177.7, "rotate": 0, "zindex": 2, "position": "left", "rotate_x": 7, "rotate_y": 17, "perspective": 1000, "order_column": 2}',
		        'created_at' => '2020-05-26 01:09:26',
		        'id' => 2,
		        'image_id' => 2,
		        'order_column' => 2,
		        'updated_at' => '2020-05-26 01:09:26',
		        'uuid' => '664dd018-f96e-4d9a-9b38-7d808325569e',
		    ],
		    [
		        'coords' => '{"top": 307, "left": -214, "active": true, "height": 147.77, "rotate": 3, "zindex": 3, "position": "left", "rotate_x": 7, "rotate_y": -27, "perspective": 400, "order_column": 3}',
		        'created_at' => '2020-05-26 01:09:35',
		        'id' => 3,
		        'image_id' => 3,
		        'order_column' => 3,
		        'updated_at' => '2020-05-26 01:09:35',
		        'uuid' => 'c6ab8e43-45a0-4c4d-ae53-d8e36af2fe32',
		    ],
		    [
		        'coords' => '{"top": 459, "left": -150, "active": true, "height": 217, "rotate": 7, "zindex": 2, "position": "left", "rotate_x": null, "rotate_y": null, "perspective": null, "order_column": 4}',
		        'created_at' => '2020-05-26 01:09:44',
		        'id' => 4,
		        'image_id' => 4,
		        'order_column' => 4,
		        'updated_at' => '2020-06-27 07:58:26',
		        'uuid' => 'c6ee2f77-883b-4590-8a75-d56a26e39427',
		    ],
		    [
		        'coords' => '{"top": 659, "left": -77, "active": true, "height": 117, "rotate": -7, "zindex": 3, "position": "left", "rotate_x": null, "rotate_y": 20, "perspective": 1000, "order_column": 5}',
		        'created_at' => '2020-05-26 01:09:52',
		        'id' => 5,
		        'image_id' => 5,
		        'order_column' => 5,
		        'updated_at' => '2020-06-27 07:58:18',
		        'uuid' => 'c2159069-9386-4068-95a8-cf9e822ddc55',
		    ],
		    [
		        'coords' => '{"top": 672, "left": -152, "active": true, "height": 97, "rotate": 3, "zindex": 3, "position": "left", "rotate_x": 0, "rotate_y": -23, "perspective": 700, "order_column": 6}',
		        'created_at' => '2020-05-26 01:10:02',
		        'id' => 6,
		        'image_id' => 6,
		        'order_column' => 6,
		        'updated_at' => '2020-06-27 07:58:18',
		        'uuid' => '8b347bfb-8b88-4412-adb4-6e5e536dd2b6',
		    ],
		    [
		        'coords' => '{"top": 772, "left": -119, "active": true, "height": 177.7, "rotate": 0, "zindex": 4, "position": "left", "rotate_x": 7, "rotate_y": 17, "perspective": 500, "order_column": 2}',
		        'created_at' => '2020-06-27 04:15:43',
		        'id' => 7,
		        'image_id' => 11,
		        'order_column' => 7,
		        'updated_at' => '2020-06-27 07:58:31',
		        'uuid' => '7b26f292-9b9c-44f9-8d2b-d977c984d60e',
		    ],
		]);
        
    }
}
