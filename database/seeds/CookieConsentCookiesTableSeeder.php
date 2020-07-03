<?php

use Illuminate\Database\Seeder;

class CookieConsentCookiesTableSeeder extends Seeder
{
    public function run()
    {
        
        \DB::table('cookie_consent_cookies')->delete();
        
        \DB::table('cookie_consent_cookies')->insert([
		    [
		        'id' => 1,
		        'cookie_name' => '*_cookie_consent',
		        'cookie_consent_provider_id' => 1,
		        'cookie_purpose' => '<span class="font-medium">Enthält:</span>'."\n"
		            ."\n"
		            .'<ul class="list-disc ml-6 mt-4">'."\n"
		            .'  <li class="py-1 text-xs">'."\n"
		            .'	deine Cookie-Einstellungen'."\n"
		            .'  </li>'."\n"
		            .'  <li class="py-1 text-xs">'."\n"
		            .'	die Information ob der Cookie-Banner bereits angezeigt wurde'."\n"
		            .'  </li>'."\n"
		            .'</ul>',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 730,
		        'encrypted' => 0,
		        'required' => 1,
		        'created_at' => '2020-06-21 13:37:57',
		        'updated_at' => '2020-06-21 13:55:16',
		        'cookie_category' => 'Notwendig',
		    ],
		    [
		        'id' => 2,
		        'cookie_name' => '*_session',
		        'cookie_consent_provider_id' => 1,
		        'cookie_purpose' => '<span class="font-medium">Enthält verschlüsselte Sitzungsdaten:</span>'."\n"
		            ."\n"
		            .'<ul class="list-disc ml-6 mt-4">'."\n"
		            .'  <li class="py-1">'."\n"
		            .'	<span class="font-medium">_token</span>'."\n"
		            .'	<br>'."\n"
		            .'	<span class="text-xs">XSRF-TOKEN (siehe unten)</span>'."\n"
		            .'  </li>'."\n"
		            .'  <li class="py-1">'."\n"
		            .'	<span class="font-medium">_previous</span>'."\n"
		            .'	<br>'."\n"
		            .'	<span class="text-xs">Zuletzte aufgerufene URL.</span>'."\n"
		            .'  </li>'."\n"
		            .'  <li class="py-1">'."\n"
		            .'	<span class="font-medium">_flash</span>'."\n"
		            .'	<br>'."\n"
		            .'	<span class="text-xs">Zur Übergabe von Seitenübergreifenden Daten, wie z.B. der Fehlermeldungen nach dem Absenden eines Formulares oder der Erfolgsnachricht.</span>'."\n"
		            .'  </li>'."\n"
		            .'</ul',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 365,
		        'encrypted' => 1,
		        'required' => 1,
		        'created_at' => '2020-06-21 07:42:08',
		        'updated_at' => '2020-06-21 13:55:21',
		        'cookie_category' => 'Notwendig',
		    ],
		    [
		        'id' => 3,
		        'cookie_name' => 'XSRF-TOKEN',
		        'cookie_consent_provider_id' => 1,
		        'cookie_purpose' => 'Sicherheitsmaßnahme gegen Cross-Site-Request-Forgery (CSRF oder XSRF abgekürzt), deutsch etwa Website-übergreifende Anfragenfälschung.'."\n"
		            .'<br>'."\n"
		            .'<br>'."\n"
		            .'Anhand des XSRF-Token wird sichergestellt, dass von dir übermittelten Daten auf ihrem Weg, zwischen Host (dein Gerät) und Server (meine Webseite), nicht von einem Hacker manipuliert werden.',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 0,
		        'encrypted' => 1,
		        'required' => 1,
		        'created_at' => '2020-06-21 07:51:29',
		        'updated_at' => '2020-06-21 07:57:13',
		        'cookie_category' => 'Notwendig',
		    ],
		    [
		        'id' => 4,
		        'cookie_name' => '_gid',
		        'cookie_consent_provider_id' => 2,
		        'cookie_purpose' => 'Registriert eine eindeutige ID, die verwendet wird, um statistische Daten dazu, wie der Besucher die Website nutzt, zu generieren.',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 1,
		        'encrypted' => 0,
		        'required' => 0,
		        'created_at' => '2020-06-21 14:04:13',
		        'updated_at' => '2020-06-21 14:04:13',
		        'cookie_category' => 'Statistiken',
		    ],
		    [
		        'id' => 5,
		        'cookie_name' => '_gat',
		        'cookie_consent_provider_id' => 2,
		        'cookie_purpose' => 'Wird von Google Analytics verwendet, um die Anforderungsrate einzuschränken.',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 1,
		        'encrypted' => 0,
		        'required' => 0,
		        'created_at' => '2020-06-21 14:05:30',
		        'updated_at' => '2020-06-21 14:05:30',
		        'cookie_category' => 'Statistiken',
		    ],
		    [
		        'id' => 6,
		        'cookie_name' => '_ga',
		        'cookie_consent_provider_id' => 2,
		        'cookie_purpose' => 'Registriert eine eindeutige ID, die verwendet wird, um statistische Daten dazu, wie der Besucher die Website nutzt, zu generieren.',
		        'cookie_type' => 'HTTP',
		        'cookie_lifetime' => 730,
		        'encrypted' => 0,
		        'required' => 0,
		        'created_at' => '2020-06-21 14:06:22',
		        'updated_at' => '2020-06-21 14:06:22',
		        'cookie_category' => 'Statistiken',
		    ],
		]);
        
    }
}
