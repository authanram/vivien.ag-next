<?php

use Illuminate\Database\Seeder;

class EventCateringsSeeder extends Seeder
{
    public function run()
    {

        \DB::table('event_caterings')->delete();

        \DB::table('event_caterings')->insert([
		    [
		        'id' => 1,
		        'uuid' => '1a6a2077-6906-4835-a16b-a2a5c26f5a18',
		        'name' => 'Robi\'s Catering',
		        'note' => 'Unschlagbar gut.',
		        'created_at' => '2022-04-27 17:17:17',
		        'updated_at' => '2022-04-27 17:17:17',
		        'deleted_at' => null,
		    ],
		]);

    }
}
