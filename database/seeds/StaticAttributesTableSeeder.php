<?php

use Illuminate\Database\Seeder;

class StaticAttributesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('static_attributes')->delete();
        
        \DB::table('static_attributes')->insert([
		    [
		        'id' => 1,
		        'name' => 'Slogan',
		        'slug' => 'slogan',
		        'type' => 0,
		        'value' => 'Beratung Therapie Seminare',
		        'data' => '{}',
		        'locked' => 1,
		        'created_at' => '2020-05-14 22:13:54',
		        'updated_at' => '2020-06-28 23:15:15',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 2,
		        'name' => 'Profession',
		        'slug' => 'profession',
		        'type' => 0,
		        'value' => 'Familientherapeutin',
		        'data' => '{}',
		        'locked' => 1,
		        'created_at' => '2020-05-14 22:14:45',
		        'updated_at' => '2020-05-14 22:15:15',
		        'deleted_at' => null,
		    ],
		    [
		        'id' => 3,
		        'name' => 'Profession (long)',
		        'slug' => 'profession-long',
		        'type' => 0,
		        'value' => 'Familientherapeutin, Pädagogin und Lerntrainerin',
		        'data' => '{}',
		        'locked' => 1,
		        'created_at' => '2020-06-29 06:41:03',
		        'updated_at' => '2020-06-29 06:41:03',
		        'deleted_at' => null,
		    ],
		]);
        
    }
}
