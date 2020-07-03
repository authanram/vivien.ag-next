<?php

use Illuminate\Database\Seeder;

class CookieConsentProvidersTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('cookie_consent_providers')->delete();
        
        \DB::table('cookie_consent_providers')->insert([
		    [
		        'id' => 1,
		        'name' => 'vivien.ag',
		        'url' => 'https://vivien.ag/cookie-vereinbarung',
		        'created_at' => '2020-06-21 07:31:12',
		        'updated_at' => '2020-06-21 07:31:12',
		    ],
		    [
		        'id' => 2,
		        'name' => 'google.com',
		        'url' => 'https://policies.google.com/privacy',
		        'created_at' => '2020-06-21 07:31:49',
		        'updated_at' => '2020-06-21 07:31:49',
		    ],
		]);
        
    }
}
