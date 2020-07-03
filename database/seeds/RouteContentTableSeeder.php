<?php

use Illuminate\Database\Seeder;

class RouteContentTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('route_content')->delete();
        
        \DB::table('route_content')->insert([
		    [
		        'content_id' => 2,
		        'route_id' => 3,
		        'sort_order' => 1,
		    ],
		    [
		        'content_id' => 4,
		        'route_id' => 3,
		        'sort_order' => 2,
		    ],
		    [
		        'content_id' => 3,
		        'route_id' => 4,
		        'sort_order' => 1,
		    ],
		    [
		        'content_id' => 5,
		        'route_id' => 5,
		        'sort_order' => 1,
		    ],
		    [
		        'content_id' => 6,
		        'route_id' => 5,
		        'sort_order' => 2,
		    ],
		    [
		        'content_id' => 7,
		        'route_id' => 5,
		        'sort_order' => 3,
		    ],
		    [
		        'content_id' => 8,
		        'route_id' => 10,
		        'sort_order' => 1,
		    ],
		    [
		        'content_id' => 9,
		        'route_id' => 11,
		        'sort_order' => 1,
		    ],
		]);
        
    }
}
