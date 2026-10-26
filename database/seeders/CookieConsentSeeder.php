<?php

namespace Database\Seeders;

use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Illuminate\Database\Seeder;

class CookieConsentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider = CookieConsentProvider::updateOrCreate(
            ['name' => 'vivien.ag'],
            ['url' => 'https://vivien.ag/cookie-vereinbarung'],
        );

        // Laravel issues the session and XSRF-TOKEN cookies with the session lifetime (minutes); listed in started days.
        $sessionLifetime = config('session.expire_on_close') ? 0 : (int) ceil(config('session.lifetime') / (60 * 24));

        $cookies = [
            [
                'cookie_name' => '*_cookie_consent',
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
                'cookie_lifetime' => config('cookie-consent.cookie_lifetime'),
                'encrypted' => false,
            ],
            [
                'cookie_name' => '*_session',
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
                    .'</ul>',
                'cookie_lifetime' => $sessionLifetime,
                'encrypted' => true,
            ],
            [
                'cookie_name' => 'XSRF-TOKEN',
                'cookie_purpose' => 'Sicherheitsmaßnahme gegen Cross-Site-Request-Forgery (CSRF oder XSRF abgekürzt), deutsch etwa Website-übergreifende Anfragenfälschung.'."\n"
                    .'<br>'."\n"
                    .'<br>'."\n"
                    .'Anhand des XSRF-Token wird sichergestellt, dass von dir übermittelten Daten auf ihrem Weg, zwischen Host (dein Gerät) und Server (meine Webseite), nicht von einem Hacker manipuliert werden.',
                'cookie_lifetime' => $sessionLifetime,
                'encrypted' => true,
            ],
        ];

        foreach ($cookies as $cookie) {
            CookieConsentCookie::updateOrCreate(
                ['cookie_name' => $cookie['cookie_name']],
                [
                    ...$cookie,
                    'cookie_consent_provider_id' => $provider->id,
                    'cookie_category' => 'Notwendig',
                    'cookie_type' => 'HTTP',
                    'required' => true,
                ],
            );
        }
    }
}
