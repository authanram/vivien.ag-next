<?php

use Illuminate\Database\Seeder;

class StaffProfilesTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('staff_profiles')->delete();

        DB::table('staff_profiles')->insert([
		    [
		        'created_at' => '2022-04-29 00:31:45',
		        'deleted_at' => null,
		        'id' => 1,
		        'image_url' => 'https://vivien.ag/images/sybille-seuffer.jpg',
		        'name' => 'Sybille Seuffer',
		        'occupation' => 'Familientherapeutin',
		        'updated_at' => '2022-04-29 00:31:45',
		    ],
		    [
		        'created_at' => '2022-04-29 00:31:41',
		        'deleted_at' => null,
		        'id' => 2,
		        'image_url' => null,
		        'name' => 'Robert Seuffer',
		        'occupation' => '',
		        'updated_at' => '2022-04-29 00:31:41',
		    ],
		    [
		        'created_at' => '2022-04-29 00:31:42',
		        'deleted_at' => null,
		        'id' => 3,
		        'image_url' => null,
		        'name' => 'Petra Anna Schmidt',
		        'occupation' => 'Märchenerzählerin',
		        'updated_at' => '2022-04-29 00:31:42',
		    ],
		]);

    }
}
