<?php

use Illuminate\Database\Seeder;

class RouteContentsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('route_contents')->delete();
        
        \DB::table('route_contents')->insert([
		    [
		        'content_id' => 2,
		        'order_column' => 1,
		        'route_id' => 3,
		    ],
		    [
		        'content_id' => 4,
		        'order_column' => 2,
		        'route_id' => 3,
		    ],
		    [
		        'content_id' => 3,
		        'order_column' => 1,
		        'route_id' => 4,
		    ],
		    [
		        'content_id' => 5,
		        'order_column' => 1,
		        'route_id' => 5,
		    ],
		    [
		        'content_id' => 6,
		        'order_column' => 2,
		        'route_id' => 5,
		    ],
		    [
		        'content_id' => 7,
		        'order_column' => 3,
		        'route_id' => 5,
		    ],
		    [
		        'content_id' => 8,
		        'order_column' => 1,
		        'route_id' => 10,
		    ],
		    [
		        'content_id' => 9,
		        'order_column' => 1,
		        'route_id' => 11,
		    ],
		]);
        
    }
}
