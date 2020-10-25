<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UsersTableSeeder extends Seeder
{
    final public function run(): void
    {
        $path = storage_path('local-users.php');

        if (!File::exists($path)) {
            return;
        }

        /**
         * @noinspection PhpIncludeInspection
         * @noinspection UsingInclusionReturnValueInspection
         */
        $users = require($path);

        foreach ($users as $user) {

            User::firstOrCreate($user);

        }

    }
}
