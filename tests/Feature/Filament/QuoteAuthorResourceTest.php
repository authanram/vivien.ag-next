<?php

use App\Filament\Resources\QuoteAuthors\Pages\CreateQuoteAuthor;
use App\Filament\Resources\QuoteAuthors\Pages\EditQuoteAuthor;
use App\Filament\Resources\QuoteAuthors\Pages\ListQuoteAuthors;
use App\Models\QuoteAuthor;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListQuoteAuthors::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateQuoteAuthor::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $author = QuoteAuthor::factory()->create();

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->assertSuccessful();
});

it('can list quote authors', function () {
    $authors = QuoteAuthor::factory()->count(3)->create();

    Livewire::test(ListQuoteAuthors::class)
        ->assertCanSeeTableRecords($authors);
});

it('can create a quote author with required fields only', function () {
    Livewire::test(CreateQuoteAuthor::class)
        ->fillForm(['name' => 'Johann Wolfgang von Goethe'])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(QuoteAuthor::class, ['name' => 'Johann Wolfgang von Goethe']);
});

it('can create a quote author with all fields', function () {
    $newData = [
        'name' => 'Friedrich Schiller',
        'occupation' => 'Dichter',
        'url' => 'https://example.com/schiller',
    ];

    Livewire::test(CreateQuoteAuthor::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(QuoteAuthor::class, $newData);
});

it('can retrieve a quote author for editing', function () {
    $author = QuoteAuthor::factory()->create();

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->assertSchemaStateSet([
            'name' => $author->name,
            'occupation' => $author->occupation,
            'url' => $author->url,
        ]);
});

it('can update a quote author', function () {
    $author = QuoteAuthor::factory()->create();

    $newData = [
        'name' => 'Updated Author',
        'occupation' => 'Updated Occupation',
        'url' => 'https://updated.example.com',
    ];

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->fillForm($newData)
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(QuoteAuthor::class, $newData);
});

it('can delete a quote author', function () {
    $author = QuoteAuthor::factory()->create();

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->callAction(DeleteAction::class);

    expect($author->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete a quote author', function () {
    $author = QuoteAuthor::factory()->create();
    $author->delete();

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(QuoteAuthor::withTrashed()->find($author->id))->toBeNull();
});

it('can restore a quote author', function () {
    $author = QuoteAuthor::factory()->create();
    $author->delete();

    Livewire::test(EditQuoteAuthor::class, ['record' => $author->uuid])
        ->callAction(RestoreAction::class);

    expect($author->fresh()->deleted_at)->toBeNull();
});

it('validates name is required', function () {
    Livewire::test(CreateQuoteAuthor::class)
        ->fillForm(['name' => ''])
        ->call('create')
        ->assertHasFormErrors(['name' => 'required']);
});

it('validates url must be a valid url', function () {
    Livewire::test(CreateQuoteAuthor::class)
        ->fillForm(['name' => 'Test', 'url' => 'not-a-url'])
        ->call('create')
        ->assertHasFormErrors(['url' => 'url']);
});

it('can bulk delete quote authors', function () {
    $authors = QuoteAuthor::factory()->count(3)->create();

    Livewire::test(ListQuoteAuthors::class)
        ->callTableBulkAction('delete', $authors);

    foreach ($authors as $author) {
        expect($author->fresh()->deleted_at)->not->toBeNull();
    }
});
