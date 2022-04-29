<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('colors')->delete();

        DB::table('colors')->insert([
		    [
		        'color' => 'teal',
		        'created_at' => '2020-05-14 17:01:55',
		        'deleted_at' => null,
		        'id' => 1,
		        'updated_at' => '2020-05-14 17:01:55',
		    ],
		    [
		        'color' => 'pink',
		        'created_at' => '2020-05-14 17:02:14',
		        'deleted_at' => null,
		        'id' => 2,
		        'updated_at' => '2020-05-14 17:02:14',
		    ],
		    [
		        'color' => 'red',
		        'created_at' => '2020-05-14 17:03:06',
		        'deleted_at' => null,
		        'id' => 3,
		        'updated_at' => '2020-05-14 17:05:16',
		    ],
		    [
		        'color' => 'blue',
		        'created_at' => '2020-05-14 17:03:36',
		        'deleted_at' => null,
		        'id' => 4,
		        'updated_at' => '2020-05-14 17:03:36',
		    ],
		    [
		        'color' => 'purple',
		        'created_at' => '2020-05-14 17:03:56',
		        'deleted_at' => null,
		        'id' => 5,
		        'updated_at' => '2020-05-14 17:03:56',
		    ],
		    [
		        'color' => 'orange',
		        'created_at' => '2020-05-14 17:04:17',
		        'deleted_at' => null,
		        'id' => 6,
		        'updated_at' => '2020-05-14 22:47:53',
		    ],
		    [
		        'color' => 'green',
		        'created_at' => '2020-05-14 17:06:51',
		        'deleted_at' => null,
		        'id' => 7,
		        'updated_at' => '2020-05-14 17:06:51',
		    ],
		    [
		        'color' => 'indigo',
		        'created_at' => '2020-05-14 17:07:10',
		        'deleted_at' => null,
		        'id' => 8,
		        'updated_at' => '2020-05-14 17:07:10',
		    ],
		    [
		        'color' => 'gray',
		        'created_at' => '2020-05-14 17:07:18',
		        'deleted_at' => null,
		        'id' => 9,
		        'updated_at' => '2020-05-14 17:07:18',
		    ],
		]);

    }
}
