<?php

use Illuminate\Database\Seeder;

class CateringsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('caterings')->delete();

        DB::table('caterings')->insert([
		    [
		        'created_at' => '2022-04-29 00:31:09',
		        'deleted_at' => null,
		        'id' => 1,
		        'name' => 'Robi\'s Catering',
		        'note' => 'Unvergesslich gut!',
		        'updated_at' => '2022-04-29 00:31:09',
		    ],
		]);

    }
}
