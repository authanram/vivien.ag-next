<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('roles')->delete();

        DB::table('roles')->insert([
		    [
		        'created_at' => '2020-10-25 10:36:24',
		        'guard_name' => 'web',
		        'id' => 1,
		        'name' => 'administrator',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		    [
		        'created_at' => '2020-10-25 10:36:24',
		        'guard_name' => 'web',
		        'id' => 2,
		        'name' => 'moderator',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		    [
		        'created_at' => '2020-10-25 10:36:24',
		        'guard_name' => 'web',
		        'id' => 3,
		        'name' => 'attendee',
		        'updated_at' => '2020-10-25 10:36:24',
		    ],
		]);

    }
}
