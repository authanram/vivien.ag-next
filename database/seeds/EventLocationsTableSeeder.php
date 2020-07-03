<?php

use Illuminate\Database\Seeder;

class EventLocationsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('event_locations')->delete();
        
        \DB::table('event_locations')->insert([
		    [
		        'address' => 'Geisswiesen 24/1, 72227 Egenhausen',
		        'created_at' => '2020-05-26 04:35:05',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 1,
		        'name' => 'Egenhausen, Geisswiesen 24/1',
		        'updated_at' => '2020-05-26 04:37:17',
		        'url' => 'https://goo.gl/maps/5SYy3qiHmQvRcci4A',
		        'uuid' => '77122bbd-d137-483e-9c78-36e79cf589a1',
		    ],
		    [
		        'address' => 'Wörnersberger Anker, Hauptstraße 32, 72299 Wörnersberg',
		        'created_at' => '2020-05-26 04:36:53',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 2,
		        'name' => 'Wörnersberger Anker',
		        'updated_at' => '2020-05-26 04:36:53',
		        'url' => 'https://goo.gl/maps/rfXYiwRyqEshUG1f6',
		        'uuid' => '54a847a1-7d44-45ce-92b9-52aca9c4ca84',
		    ],
		    [
		        'address' => 'Altensteiger Str. 43, 72294 Grömbach',
		        'created_at' => '2020-05-26 04:38:06',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 3,
		        'name' => 'Atelier, Grömbach',
		        'updated_at' => '2020-05-26 04:38:06',
		        'url' => 'https://goo.gl/maps/GQBhEMvpb7sHtHdc7',
		        'uuid' => '0a7b33b4-fffa-4afe-a77d-5f99e7c341b4',
		    ],
		    [
		        'address' => '-',
		        'created_at' => '2020-05-26 04:41:10',
		        'deleted_at' => null,
		        'description' => 'Im gemütlichen Eigenheim',
		        'id' => 4,
		        'name' => 'At home',
		        'updated_at' => '2020-05-26 04:43:02',
		        'url' => null,
		        'uuid' => '3e5e9c93-5c9b-43e9-ba07-90e3a9cbd355',
		    ],
		    [
		        'address' => '-',
		        'created_at' => '2020-05-26 04:42:43',
		        'deleted_at' => null,
		        'description' => 'Mit dem E-Bike auf Nebenstrecken',
		        'id' => 5,
		        'name' => 'Auf Nebenstrecken',
		        'updated_at' => '2020-05-26 04:42:43',
		        'url' => null,
		        'uuid' => '80dad4f2-f984-4ad3-9a7f-f4c1c037f72c',
		    ],
		    [
		        'address' => null,
		        'created_at' => '2020-06-28 22:08:33',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 6,
		        'name' => 'Am Telefon',
		        'updated_at' => '2020-06-28 22:08:33',
		        'url' => null,
		        'uuid' => '8e9a0987-8c54-4c53-8240-f240ed9ded84',
		    ],
		]);
        
    }
}
