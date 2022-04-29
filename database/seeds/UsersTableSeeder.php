<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('users')->delete();

        DB::table('users')->insert([
		    [
		        'created_at' => '2022-04-29 02:35:55',
		        'email' => 'authanram@gmail.com',
		        'email_verified_at' => null,
		        'id' => 1,
		        'name' => 'Daniel Seuffer',
		        'password' => '$2y$10$kuv7EdXAKFBhn84jLrS5guTSP2EspJI0n6RyiiBCYCrXpPQUDnYCO',
		        'remember_token' => null,
		        'updated_at' => '2022-04-29 02:35:55',
		    ],
		    [
		        'created_at' => '2022-04-29 02:35:55',
		        'email' => 'me@vivien.ag',
		        'email_verified_at' => null,
		        'id' => 2,
		        'name' => 'Sybille Seuffer',
		        'password' => '$2y$10$GgegQYesNr7JTX8lDKs5Tuvw3KxHeYSJsGkWlUdpF0RcIIGGUL5Ke',
		        'remember_token' => null,
		        'updated_at' => '2022-04-29 02:35:55',
		    ],
		    [
		        'created_at' => '2022-04-29 02:35:55',
		        'email' => 'user@local.host',
		        'email_verified_at' => null,
		        'id' => 3,
		        'name' => 'User Name',
		        'password' => '$2y$10$GgegQYesNr7JTX8lDKs5Tuvw3KxHeYSJsGkWlUdpF0RcIIGGUL5Ke',
		        'remember_token' => null,
		        'updated_at' => '2022-04-29 02:35:55',
		    ],
		]);

    }
}
