<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert([
		    [
		        'id' => 1,
		        'name' => 'administrator',
		        'guard_name' => 'web',
		        'created_at' => '2020-10-25 10:36:24',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		    [
		        'id' => 2,
		        'name' => 'moderator',
		        'guard_name' => 'web',
		        'created_at' => '2020-10-25 10:36:24',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		    [
		        'id' => 3,
		        'name' => 'attendee',
		        'guard_name' => 'web',
		        'created_at' => '2020-10-25 10:36:24',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		]);
        
    }
}
