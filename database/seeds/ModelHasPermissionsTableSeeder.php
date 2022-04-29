<?php

use Illuminate\Database\Seeder;

class ModelHasPermissionsTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('model_has_permissions')->delete();


    }
}
