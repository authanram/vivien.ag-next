<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('role_has_permissions')->delete();
        
        
    }
}
