<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert([
		    [
		        'id' => 1,
		        'uuid' => '4890423b-57bd-4917-91b2-24f533a3e041',
		        'color' => 'teal',
		        'created_at' => '2020-05-14 17:01:55',
		        'updated_at' => '2020-05-14 17:01:55',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 2,
		        'uuid' => 'e7e25007-3efc-41a3-a43f-009dad0cb4f4',
		        'color' => 'pink',
		        'created_at' => '2020-05-14 17:02:14',
		        'updated_at' => '2020-05-14 17:02:14',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 3,
		        'uuid' => '53568189-3729-47da-860d-be0d8fe3090e',
		        'color' => 'red',
		        'created_at' => '2020-05-14 17:03:06',
		        'updated_at' => '2020-05-14 17:05:16',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 4,
		        'uuid' => '5789a933-f33d-4c38-a993-f191e183d932',
		        'color' => 'blue',
		        'created_at' => '2020-05-14 17:03:36',
		        'updated_at' => '2020-05-14 17:03:36',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 5,
		        'uuid' => '6265b3e0-48db-4d14-90fc-a12b297965fb',
		        'color' => 'purple',
		        'created_at' => '2020-05-14 17:03:56',
		        'updated_at' => '2020-05-14 17:03:56',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 6,
		        'uuid' => 'f2ab7e34-0c5f-4994-ad42-47b13732f745',
		        'color' => 'orange',
		        'created_at' => '2020-05-14 17:04:17',
		        'updated_at' => '2020-05-14 22:47:53',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 7,
		        'uuid' => 'd31107f3-c46d-44c5-a3d9-50af0a2efc65',
		        'color' => 'green',
		        'created_at' => '2020-05-14 17:06:51',
		        'updated_at' => '2020-05-14 17:06:51',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 8,
		        'uuid' => 'f64c210f-2efb-44f4-a039-ad06aa92c188',
		        'color' => 'indigo',
		        'created_at' => '2020-05-14 17:07:10',
		        'updated_at' => '2020-05-14 17:07:10',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 9,
		        'uuid' => 'd58b0241-9034-4585-943f-35ed822d7f53',
		        'color' => 'gray',
		        'created_at' => '2020-05-14 17:07:18',
		        'updated_at' => '2020-05-14 17:07:18',
		        'deleted_at' => null,
		    ],
		]);
        
    }
}
