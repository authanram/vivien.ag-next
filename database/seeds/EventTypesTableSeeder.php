<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('event_types')->delete();
        
        \DB::table('event_types')->insert([
		    [
		        'color_id' => 8,
		        'created_at' => '2020-05-26 04:27:53',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 1,
		        'name' => 'Filmclub',
		        'updated_at' => '2020-05-26 04:27:53',
		        'uuid' => 'd75f55a7-7c5b-4044-b76e-23880c029f68',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2020-05-26 04:28:28',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 2,
		        'name' => 'Frauengruppe 1, Mittwoch',
		        'updated_at' => '2020-05-26 04:28:28',
		        'uuid' => '69bafc5d-3d0f-42b3-9b9c-64ef3cf1f760',
		    ],
		    [
		        'color_id' => 8,
		        'created_at' => '2020-05-26 04:28:32',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 3,
		        'name' => 'Frauengruppe 2, Mittwoch',
		        'updated_at' => '2020-05-26 04:28:32',
		        'uuid' => '862b3c23-aaf2-4baa-a511-836473f29c62',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:28:40',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 4,
		        'name' => 'Frauengruppe, Freitag',
		        'updated_at' => '2020-05-26 04:28:40',
		        'uuid' => '5b18af95-400b-4ad6-8f34-4cdddcf9d1ff',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:28:59',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 5,
		        'name' => 'Frauenwochenende, Wörnersberger Anker',
		        'updated_at' => '2020-05-26 04:28:59',
		        'uuid' => 'aadebb90-d4e0-476e-900d-8467e822c3ac',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:07',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 6,
		        'name' => 'Malwerkstatt, Sonntag',
		        'updated_at' => '2020-05-26 04:29:07',
		        'uuid' => '9ae717d5-f459-489d-8444-787c13feb9be',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:15',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 7,
		        'name' => 'Online Schreibwerkstatt, Samstag',
		        'updated_at' => '2020-05-26 04:29:15',
		        'uuid' => '3d1ee061-8ab7-4ace-b55d-f01acbfd14b2',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:29:24',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 8,
		        'name' => 'Online Schreibwerkstatt, Freitag',
		        'updated_at' => '2020-05-26 04:29:24',
		        'uuid' => 'ef82e41e-75d7-49ba-a5b5-87a27d649e71',
		    ],
		    [
		        'color_id' => 4,
		        'created_at' => '2020-05-26 04:29:32',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 9,
		        'name' => 'Paargruppe 1',
		        'updated_at' => '2020-05-26 04:29:32',
		        'uuid' => '69ab294a-5e10-450b-81db-72c41e0923fe',
		    ],
		    [
		        'color_id' => 3,
		        'created_at' => '2020-05-26 04:29:41',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 10,
		        'name' => 'Paargruppe 2',
		        'updated_at' => '2020-05-26 04:29:41',
		        'uuid' => 'cad8e0dd-0e55-4af9-be48-e2c82eac8d41',
		    ],
		    [
		        'color_id' => 5,
		        'created_at' => '2020-05-26 04:30:18',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 11,
		        'name' => 'Schreibausflug, mit dem E-Bike',
		        'updated_at' => '2020-05-26 04:30:18',
		        'uuid' => '158a5f04-d7f5-4c08-98b3-1f3cf369aa43',
		    ],
		    [
		        'color_id' => 2,
		        'created_at' => '2020-05-26 04:30:27',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 12,
		        'name' => 'Schreibwerkstatt',
		        'updated_at' => '2020-05-26 04:30:27',
		        'uuid' => '4337a306-25d6-48c9-823e-3bd9adeae5f4',
		    ],
		    [
		        'color_id' => 7,
		        'created_at' => '2020-06-28 22:07:43',
		        'deleted_at' => null,
		        'description' => null,
		        'id' => 13,
		        'name' => 'Erzähl mir dein Leben',
		        'updated_at' => '2020-06-28 22:07:43',
		        'uuid' => 'e01493ba-9187-4e51-96bb-24ffbe84f87a',
		    ],
		]);
        
    }
}
