<?php

use Illuminate\Database\Seeder;

class StaticAttributesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('static_attributes')->delete();
        
        \DB::table('static_attributes')->insert([
		    [
		        'created_at' => '2020-05-14 22:13:54',
		        'data' => '{}',
		        'deleted_at' => null,
		        'id' => 1,
		        'locked' => 1,
		        'name' => 'Slogan',
		        'slug' => 'slogan',
		        'type' => 0,
		        'updated_at' => '2020-06-28 23:15:15',
		        'value' => 'Beratung Therapie Seminare',
		    ],
		    [
		        'created_at' => '2020-05-14 22:14:45',
		        'data' => '{}',
		        'deleted_at' => null,
		        'id' => 2,
		        'locked' => 1,
		        'name' => 'Profession',
		        'slug' => 'profession',
		        'type' => 0,
		        'updated_at' => '2020-05-14 22:15:15',
		        'value' => 'Familientherapeutin',
		    ],
		    [
		        'created_at' => '2020-06-29 06:41:03',
		        'data' => '{}',
		        'deleted_at' => null,
		        'id' => 3,
		        'locked' => 1,
		        'name' => 'Profession (long)',
		        'slug' => 'profession-long',
		        'type' => 0,
		        'updated_at' => '2020-06-29 06:41:03',
		        'value' => 'Familientherapeutin, Pädagogin und Lerntrainerin',
		    ],
		]);
        
    }
}
