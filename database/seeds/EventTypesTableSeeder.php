<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('event_types')->delete();
        
        \DB::table('event_types')->insert([
		    [
		        'id' => 1,
		        'color_id' => 8,
		        'uuid' => 'd75f55a7-7c5b-4044-b76e-23880c029f68',
		        'name' => 'Filmclub',
		        'description' => null,
		        'created_at' => '2020-05-26 04:27:53',
		        'updated_at' => '2020-05-26 04:27:53',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 2,
		        'color_id' => 3,
		        'uuid' => '69bafc5d-3d0f-42b3-9b9c-64ef3cf1f760',
		        'name' => 'Frauengruppe 1, Mittwoch',
		        'description' => null,
		        'created_at' => '2020-05-26 04:28:28',
		        'updated_at' => '2020-05-26 04:28:28',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 3,
		        'color_id' => 8,
		        'uuid' => '862b3c23-aaf2-4baa-a511-836473f29c62',
		        'name' => 'Frauengruppe 2, Mittwoch',
		        'description' => null,
		        'created_at' => '2020-05-26 04:28:32',
		        'updated_at' => '2020-05-26 04:28:32',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 4,
		        'color_id' => 5,
		        'uuid' => '5b18af95-400b-4ad6-8f34-4cdddcf9d1ff',
		        'name' => 'Frauengruppe, Freitag',
		        'description' => null,
		        'created_at' => '2020-05-26 04:28:40',
		        'updated_at' => '2020-05-26 04:28:40',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 5,
		        'color_id' => 5,
		        'uuid' => 'aadebb90-d4e0-476e-900d-8467e822c3ac',
		        'name' => 'Frauenwochenende, Wörnersberger Anker',
		        'description' => null,
		        'created_at' => '2020-05-26 04:28:59',
		        'updated_at' => '2020-05-26 04:28:59',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 6,
		        'color_id' => 2,
		        'uuid' => '9ae717d5-f459-489d-8444-787c13feb9be',
		        'name' => 'Malwerkstatt, Sonntag',
		        'description' => null,
		        'created_at' => '2020-05-26 04:29:07',
		        'updated_at' => '2020-05-26 04:29:07',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 7,
		        'color_id' => 2,
		        'uuid' => '3d1ee061-8ab7-4ace-b55d-f01acbfd14b2',
		        'name' => 'Online Schreibwerkstatt, Samstag',
		        'description' => null,
		        'created_at' => '2020-05-26 04:29:15',
		        'updated_at' => '2020-05-26 04:29:15',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 8,
		        'color_id' => 2,
		        'uuid' => 'ef82e41e-75d7-49ba-a5b5-87a27d649e71',
		        'name' => 'Online Schreibwerkstatt, Freitag',
		        'description' => null,
		        'created_at' => '2020-05-26 04:29:24',
		        'updated_at' => '2020-05-26 04:29:24',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 9,
		        'color_id' => 4,
		        'uuid' => '69ab294a-5e10-450b-81db-72c41e0923fe',
		        'name' => 'Paargruppe 1',
		        'description' => null,
		        'created_at' => '2020-05-26 04:29:32',
		        'updated_at' => '2020-05-26 04:29:32',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 10,
		        'color_id' => 3,
		        'uuid' => 'cad8e0dd-0e55-4af9-be48-e2c82eac8d41',
		        'name' => 'Paargruppe 2',
		        'description' => null,
		        'created_at' => '2020-05-26 04:29:41',
		        'updated_at' => '2020-05-26 04:29:41',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 11,
		        'color_id' => 5,
		        'uuid' => '158a5f04-d7f5-4c08-98b3-1f3cf369aa43',
		        'name' => 'Schreibausflug, mit dem E-Bike',
		        'description' => null,
		        'created_at' => '2020-05-26 04:30:18',
		        'updated_at' => '2020-05-26 04:30:18',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 12,
		        'color_id' => 2,
		        'uuid' => '4337a306-25d6-48c9-823e-3bd9adeae5f4',
		        'name' => 'Schreibwerkstatt',
		        'description' => null,
		        'created_at' => '2020-05-26 04:30:27',
		        'updated_at' => '2020-05-26 04:30:27',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 13,
		        'color_id' => 7,
		        'uuid' => 'e01493ba-9187-4e51-96bb-24ffbe84f87a',
		        'name' => 'Erzähl mir dein Leben',
		        'description' => null,
		        'created_at' => '2020-06-28 22:07:43',
		        'updated_at' => '2020-06-28 22:07:43',
		        'deleted_at' => null,
		    ],
		]);
        
    }
}
