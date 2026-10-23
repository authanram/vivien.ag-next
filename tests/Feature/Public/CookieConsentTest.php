<?php

use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Inertia\Testing\AssertableInertia as Assert;

test('teilt die cookie-consent konfiguration ohne zustimmung', function () {
    $this->get('/portrait')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->where('cookieConsent', [
                'name' => 'vivienag_cookie_consent',
                'lifetime' => 365 * 20,
                'consented' => false,
                'secure' => (bool) config('session.secure'),
                'sameSite' => config('session.same_site'),
                'domain' => config('session.domain'),
            ])
        );
});

test('erkennt die zustimmung am unverschlüsselten consent-cookie', function () {
    $this->withUnencryptedCookie(config('cookie-consent.cookie_name'), '1')
        ->get('/portrait')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->where('cookieConsent.consented', true));
});

test('cookie-vereinbarung listet die cookies sortiert nach kategorie und name', function () {
    $provider = CookieConsentProvider::factory()->create(['name' => 'vivien.ag', 'url' => 'https://vivien.ag/cookie-vereinbarung']);
    CookieConsentCookie::factory()->for($provider)->create(['cookie_name' => 'b_cookie', 'cookie_category' => 'Notwendig']);
    CookieConsentCookie::factory()->for($provider)->create(['cookie_name' => 'a_cookie', 'cookie_category' => 'Notwendig']);
    $first = CookieConsentCookie::factory()->for($provider)->create(['cookie_name' => 'z_cookie', 'cookie_category' => 'A-Kategorie']);

    $this->get('/cookie-vereinbarung')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('public/CookieVereinbarung')
            ->has('cookies.data', 3)
            ->where('cookies.data.0', [
                'id' => $first->id,
                'cookie_name' => 'z_cookie',
                'cookie_purpose' => $first->cookie_purpose,
                'cookie_category' => 'A-Kategorie',
                'cookie_type' => $first->cookie_type,
                'cookie_lifetime' => $first->cookie_lifetime,
                'encrypted' => $first->encrypted,
                'required' => $first->required,
                'provider' => ['name' => 'vivien.ag', 'url' => 'https://vivien.ag/cookie-vereinbarung'],
            ])
            ->where('cookies.data.1.cookie_name', 'a_cookie')
            ->where('cookies.data.2.cookie_name', 'b_cookie')
        );
});
