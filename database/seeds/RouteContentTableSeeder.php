<?php

use Illuminate\Database\Seeder;

class RouteContentTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('route_content')->delete();
        
        \DB::table('route_content')->insert([
		    [
		        'route_id' => 3,
		        'content_id' => 2,
		        'sort_order' => 1,
		    ],
		    [
		        'route_id' => 3,
		        'content_id' => 4,
		        'sort_order' => 2,
		    ],
		    [
		        'route_id' => 4,
		        'content_id' => 3,
		        'sort_order' => 1,
		    ],
		    [
		        'route_id' => 5,
		        'content_id' => 5,
		        'sort_order' => 1,
		    ],
		    [
		        'route_id' => 5,
		        'content_id' => 6,
		        'sort_order' => 2,
		    ],
		    [
		        'route_id' => 5,
		        'content_id' => 7,
		        'sort_order' => 3,
		    ],
		    [
		        'route_id' => 10,
		        'content_id' => 8,
		        'sort_order' => 1,
		    ],
		    [
		        'route_id' => 11,
		        'content_id' => 9,
		        'sort_order' => 1,
		    ],
		]);
        
    }
}
