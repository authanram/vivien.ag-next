<?php

use Illuminate\Database\Seeder;

class CookieConsentProvidersTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('cookie_consent_providers')->delete();

        DB::table('cookie_consent_providers')->insert([
		    [
		        'created_at' => '2020-06-21 07:31:12',
		        'id' => 1,
		        'name' => 'vivien.ag',
		        'updated_at' => '2020-06-21 07:31:12',
		        'url' => 'https://vivien.ag/cookie-vereinbarung',
		    ],
		    [
		        'created_at' => '2020-06-21 07:31:49',
		        'id' => 2,
		        'name' => 'google.com',
		        'updated_at' => '2020-06-21 07:31:49',
		        'url' => 'https://policies.google.com/privacy',
		    ],
		]);

    }
}
