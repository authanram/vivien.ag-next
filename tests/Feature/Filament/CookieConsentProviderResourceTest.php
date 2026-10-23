<?php

use App\Filament\Resources\CookieConsentProviders\Pages\CreateCookieConsentProvider;
use App\Filament\Resources\CookieConsentProviders\Pages\EditCookieConsentProvider;
use App\Filament\Resources\CookieConsentProviders\Pages\ListCookieConsentProviders;
use App\Models\CookieConsentCookie;
use App\Models\CookieConsentProvider;
use Filament\Actions\DeleteAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListCookieConsentProviders::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateCookieConsentProvider::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $provider = CookieConsentProvider::factory()->create();

    Livewire::test(EditCookieConsentProvider::class, ['record' => $provider->id])
        ->assertSuccessful();
});

it('can list cookie providers', function () {
    $providers = CookieConsentProvider::factory()->count(3)->create();

    Livewire::test(ListCookieConsentProviders::class)
        ->assertCanSeeTableRecords($providers);
});

it('can create a cookie provider', function () {
    $newData = [
        'name' => 'vivien.ag',
        'url' => 'https://vivien.ag/cookie-vereinbarung',
    ];

    Livewire::test(CreateCookieConsentProvider::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(CookieConsentProvider::class, $newData);
});

it('can retrieve a cookie provider for editing', function () {
    $provider = CookieConsentProvider::factory()->create();

    Livewire::test(EditCookieConsentProvider::class, ['record' => $provider->id])
        ->assertSchemaStateSet([
            'name' => $provider->name,
            'url' => $provider->url,
        ]);
});

it('can update a cookie provider', function () {
    $provider = CookieConsentProvider::factory()->create();

    $newData = [
        'name' => 'updated.example.com',
        'url' => 'https://updated.example.com/privacy',
    ];

    Livewire::test(EditCookieConsentProvider::class, ['record' => $provider->id])
        ->fillForm($newData)
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(CookieConsentProvider::class, $newData);
});

it('deletes the provider together with its cookies', function () {
    $provider = CookieConsentProvider::factory()->create();
    $cookie = CookieConsentCookie::factory()->for($provider)->create();

    Livewire::test(EditCookieConsentProvider::class, ['record' => $provider->id])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($provider);
    $this->assertModelMissing($cookie);
});

it('validates required fields and url', function () {
    Livewire::test(CreateCookieConsentProvider::class)
        ->fillForm(['name' => '', 'url' => 'not-a-url'])
        ->call('create')
        ->assertHasFormErrors(['name' => 'required', 'url' => 'url']);
});

it('can bulk delete cookie providers', function () {
    $providers = CookieConsentProvider::factory()->count(3)->create();

    Livewire::test(ListCookieConsentProviders::class)
        ->callTableBulkAction('delete', $providers);

    foreach ($providers as $provider) {
        $this->assertModelMissing($provider);
    }
});
