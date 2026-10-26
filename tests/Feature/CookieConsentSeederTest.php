<?php

use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Database\Seeders\CookieConsentSeeder;

test('seeds the necessary cookies and stays idempotent', function () {
    $this->seed(CookieConsentSeeder::class);
    $this->seed(CookieConsentSeeder::class);

    expect(CookieConsentProvider::count())->toBe(1)
        ->and(CookieConsentCookie::count())->toBe(3)
        ->and(CookieConsentCookie::where('cookie_category', '!=', 'Notwendig')->exists())->toBeFalse()
        ->and(CookieConsentCookie::orderBy('cookie_name')->pluck('cookie_name')->all())->toBe([
            '*_cookie_consent',
            '*_session',
            'XSRF-TOKEN',
        ]);

    $this->assertDatabaseHas(CookieConsentCookie::class, [
        'cookie_name' => '*_cookie_consent',
        'cookie_lifetime' => 365 * 20,
        'encrypted' => false,
        'required' => true,
    ]);
});
