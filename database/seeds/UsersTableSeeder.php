<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $path = storage_path('local-users.php');

        if (!File::exists($path)) {
            return;
        }

        $users = require($path);

        foreach ($users as $user) {

            User::firstOrCreate($user);

        }

    }
}
