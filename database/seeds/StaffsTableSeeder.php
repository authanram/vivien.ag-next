<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    public function run()
    {

        \DB::table('staffs')->delete();

        \DB::table('staffs')->insert([
		    [
		        'id' => 1,
		        'uuid' => '7c1d1eca-6fc2-4994-8578-e086b8553daf',
		        'name' => 'Sybille Seuffer',
		        'occupation' => 'Familientherapeutin',
		        'image_url' => 'https://vivien.ag/images/sybille-seuffer.jpg',
		        'created_at' => '2022-04-27 21:36:09',
		        'updated_at' => '2022-04-27 21:36:09',
		        'deleted_at' => null,
		    ],
		]);

    }
}
