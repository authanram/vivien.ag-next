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
		        'id' => 1,
		        'image_id' => 1,
		        'order_column' => 1,
		    ],
		    [
		        'coords' => '{"top": 280, "left": -119, "active": true, "height": 177.7, "rotate": 0, "zindex": 2, "position": "left", "rotate_x": 7, "rotate_y": 17, "perspective": 1000, "order_column": 2}',
		        'id' => 2,
		        'image_id' => 2,
		        'order_column' => 2,
		    ],
		    [
		        'coords' => '{"top": 307, "left": -214, "active": true, "height": 147.77, "rotate": 3, "zindex": 3, "position": "left", "rotate_x": 7, "rotate_y": -27, "perspective": 400, "order_column": 3}',
		        'id' => 3,
		        'image_id' => 3,
		        'order_column' => 3,
		    ],
		    [
		        'coords' => '{"top": 459, "left": -150, "active": true, "height": 217, "rotate": 7, "zindex": 2, "position": "left", "rotate_x": null, "rotate_y": null, "perspective": null, "order_column": 4}',
		        'id' => 4,
		        'image_id' => 4,
		        'order_column' => 4,
		    ],
		    [
		        'coords' => '{"top": 659, "left": -77, "active": true, "height": 117, "rotate": -7, "zindex": 3, "position": "left", "rotate_x": null, "rotate_y": 20, "perspective": 1000, "order_column": 5}',
		        'id' => 5,
		        'image_id' => 5,
		        'order_column' => 5,
		    ],
		    [
		        'coords' => '{"top": 672, "left": -152, "active": true, "height": 97, "rotate": 3, "zindex": 3, "position": "left", "rotate_x": 0, "rotate_y": -23, "perspective": 700, "order_column": 6}',
		        'id' => 6,
		        'image_id' => 6,
		        'order_column' => 6,
		    ],
		    [
		        'coords' => '{"top": 772, "left": -119, "active": true, "height": 177.7, "rotate": 0, "zindex": 4, "position": "left", "rotate_x": 7, "rotate_y": 17, "perspective": 500, "order_column": 2}',
		        'id' => 7,
		        'image_id' => 11,
		        'order_column' => 7,
		    ],
		]);
        
    }
}
