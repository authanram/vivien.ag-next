<?php

use Illuminate\Database\Seeder;

class EventLocationsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('event_locations')->delete();
        
        \DB::table('event_locations')->insert([
		    [
		        'id' => 1,
		        'uuid' => '77122bbd-d137-483e-9c78-36e79cf589a1',
		        'name' => 'Egenhausen, Geisswiesen 24/1',
		        'description' => null,
		        'address' => 'Geisswiesen 24/1, 72227 Egenhausen',
		        'url' => 'https://goo.gl/maps/5SYy3qiHmQvRcci4A',
		        'created_at' => '2020-05-26 04:35:05',
		        'updated_at' => '2020-05-26 04:37:17',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 2,
		        'uuid' => '54a847a1-7d44-45ce-92b9-52aca9c4ca84',
		        'name' => 'Wörnersberger Anker',
		        'description' => null,
		        'address' => 'Wörnersberger Anker, Hauptstraße 32, 72299 Wörnersberg',
		        'url' => 'https://goo.gl/maps/rfXYiwRyqEshUG1f6',
		        'created_at' => '2020-05-26 04:36:53',
		        'updated_at' => '2020-05-26 04:36:53',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 3,
		        'uuid' => '0a7b33b4-fffa-4afe-a77d-5f99e7c341b4',
		        'name' => 'Atelier, Grömbach',
		        'description' => null,
		        'address' => 'Altensteiger Str. 43, 72294 Grömbach',
		        'url' => 'https://goo.gl/maps/GQBhEMvpb7sHtHdc7',
		        'created_at' => '2020-05-26 04:38:06',
		        'updated_at' => '2020-05-26 04:38:06',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 4,
		        'uuid' => '3e5e9c93-5c9b-43e9-ba07-90e3a9cbd355',
		        'name' => 'At home',
		        'description' => 'Im gemütlichen Eigenheim',
		        'address' => '-',
		        'url' => null,
		        'created_at' => '2020-05-26 04:41:10',
		        'updated_at' => '2020-05-26 04:43:02',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 5,
		        'uuid' => '80dad4f2-f984-4ad3-9a7f-f4c1c037f72c',
		        'name' => 'Auf Nebenstrecken',
		        'description' => 'Mit dem E-Bike auf Nebenstrecken',
		        'address' => '-',
		        'url' => null,
		        'created_at' => '2020-05-26 04:42:43',
		        'updated_at' => '2020-05-26 04:42:43',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 6,
		        'uuid' => '8e9a0987-8c54-4c53-8240-f240ed9ded84',
		        'name' => 'Am Telefon',
		        'description' => null,
		        'address' => null,
		        'url' => null,
		        'created_at' => '2020-06-28 22:08:33',
		        'updated_at' => '2020-06-28 22:08:33',
		        'deleted_at' => null,
		    ],
		]);
        
    }
}
