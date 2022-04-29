<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('model_has_roles')->delete();

        DB::table('model_has_roles')->insert([
		    [
		        'model_id' => 1,
		        'model_type' => 'App\\Models\\User',
		        'role_id' => 1,
		    ],
		    [
		        'model_id' => 2,
		        'model_type' => 'App\\Models\\User',
		        'role_id' => 2,
		    ],
		    [
		        'model_id' => 3,
		        'model_type' => 'App\\Models\\User',
		        'role_id' => 3,
		    ],
		]);

    }
}
