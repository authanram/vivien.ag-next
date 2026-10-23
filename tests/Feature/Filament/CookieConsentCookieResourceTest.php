<?php

use App\Filament\Resources\CookieConsentCookies\Pages\CreateCookieConsentCookie;
use App\Filament\Resources\CookieConsentCookies\Pages\EditCookieConsentCookie;
use App\Filament\Resources\CookieConsentCookies\Pages\ListCookieConsentCookies;
use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Filament\Actions\DeleteAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListCookieConsentCookies::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateCookieConsentCookie::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $cookie = CookieConsentCookie::factory()->create();

    Livewire::test(EditCookieConsentCookie::class, ['record' => $cookie->id])
        ->assertSuccessful();
});

it('can list cookies', function () {
    $cookies = CookieConsentCookie::factory()->count(3)->create();

    Livewire::test(ListCookieConsentCookies::class)
        ->assertCanSeeTableRecords($cookies);
});

it('can create a cookie', function () {
    $provider = CookieConsentProvider::factory()->create();

    $newData = [
        'cookie_name' => 'XSRF-TOKEN',
        'cookie_consent_provider_id' => $provider->id,
        'cookie_purpose' => '<span class="font-medium">Schutz vor CSRF</span>',
        'cookie_category' => 'Notwendig',
        'cookie_type' => 'HTTP',
        'cookie_lifetime' => 0,
        'encrypted' => true,
        'required' => true,
    ];

    Livewire::test(CreateCookieConsentCookie::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(CookieConsentCookie::class, $newData);
});

it('can retrieve a cookie for editing', function () {
    $cookie = CookieConsentCookie::factory()->create();

    Livewire::test(EditCookieConsentCookie::class, ['record' => $cookie->id])
        ->assertSchemaStateSet([
            'cookie_name' => $cookie->cookie_name,
            'cookie_consent_provider_id' => $cookie->cookie_consent_provider_id,
            'cookie_purpose' => $cookie->cookie_purpose,
            'cookie_category' => $cookie->cookie_category,
            'cookie_type' => $cookie->cookie_type,
            'cookie_lifetime' => $cookie->cookie_lifetime,
            'encrypted' => $cookie->encrypted,
            'required' => $cookie->required,
        ]);
});

it('can update a cookie', function () {
    $cookie = CookieConsentCookie::factory()->create();

    $newData = [
        'cookie_name' => 'updated_cookie',
        'cookie_purpose' => 'Aktualisierter Zweck',
        'cookie_lifetime' => 30,
        'required' => true,
    ];

    Livewire::test(EditCookieConsentCookie::class, ['record' => $cookie->id])
        ->fillForm($newData)
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(CookieConsentCookie::class, ['id' => $cookie->id, ...$newData]);
});

it('can delete a cookie', function () {
    $cookie = CookieConsentCookie::factory()->create();

    Livewire::test(EditCookieConsentCookie::class, ['record' => $cookie->id])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($cookie);
});

it('validates required fields', function () {
    Livewire::test(CreateCookieConsentCookie::class)
        ->fillForm([
            'cookie_name' => '',
            'cookie_consent_provider_id' => null,
            'cookie_purpose' => '',
            'cookie_category' => '',
            'cookie_type' => '',
            'cookie_lifetime' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'cookie_name' => 'required',
            'cookie_consent_provider_id' => 'required',
            'cookie_purpose' => 'required',
            'cookie_category' => 'required',
            'cookie_type' => 'required',
            'cookie_lifetime' => 'required',
        ]);
});

it('validates the cookie name is unique', function () {
    $existing = CookieConsentCookie::factory()->create();

    Livewire::test(CreateCookieConsentCookie::class)
        ->fillForm(['cookie_name' => $existing->cookie_name])
        ->call('create')
        ->assertHasFormErrors(['cookie_name' => 'unique']);
});

it('keeps its own cookie name when saving', function () {
    $cookie = CookieConsentCookie::factory()->create();

    Livewire::test(EditCookieConsentCookie::class, ['record' => $cookie->id])
        ->call('save')
        ->assertHasNoFormErrors();
});

it('can bulk delete cookies', function () {
    $cookies = CookieConsentCookie::factory()->count(3)->create();

    Livewire::test(ListCookieConsentCookies::class)
        ->callTableBulkAction('delete', $cookies);

    foreach ($cookies as $cookie) {
        $this->assertModelMissing($cookie);
    }
});
