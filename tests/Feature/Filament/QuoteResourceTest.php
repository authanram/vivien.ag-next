<?php

use App\Filament\Resources\Quotes\Pages\CreateQuote;
use App\Filament\Resources\Quotes\Pages\EditQuote;
use App\Filament\Resources\Quotes\Pages\ListQuotes;
use App\Models\Quote;
use App\Models\QuoteAuthor;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListQuotes::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateQuote::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $quote = Quote::factory()->create();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->assertSuccessful();
});

it('can list quotes', function () {
    $quotes = Quote::factory()->count(3)->create();

    Livewire::test(ListQuotes::class)
        ->assertCanSeeTableRecords($quotes);
});

it('can create a quote', function () {
    $author = QuoteAuthor::factory()->create();

    Livewire::test(CreateQuote::class)
        ->fillForm([
            'quote_author_id' => $author->id,
            'body' => 'Ein berühmtes Zitat.',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Quote::class, [
        'quote_author_id' => $author->id,
        'body' => 'Ein berühmtes Zitat.',
    ]);
});

it('can retrieve a quote for editing', function () {
    $quote = Quote::factory()->create();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->assertSchemaStateSet([
            'quote_author_id' => $quote->quote_author_id,
            'body' => $quote->body,
        ]);
});

it('can update a quote', function () {
    $quote = Quote::factory()->create();
    $newAuthor = QuoteAuthor::factory()->create();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->fillForm([
            'quote_author_id' => $newAuthor->id,
            'body' => 'Updated quote body.',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Quote::class, [
        'id' => $quote->id,
        'quote_author_id' => $newAuthor->id,
        'body' => 'Updated quote body.',
    ]);
});

it('can delete a quote', function () {
    $quote = Quote::factory()->create();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->callAction(DeleteAction::class);

    expect($quote->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete a quote', function () {
    $quote = Quote::factory()->create();
    $quote->delete();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(Quote::withTrashed()->find($quote->id))->toBeNull();
});

it('can restore a quote', function () {
    $quote = Quote::factory()->create();
    $quote->delete();

    Livewire::test(EditQuote::class, ['record' => $quote->uuid])
        ->callAction(RestoreAction::class);

    expect($quote->fresh()->deleted_at)->toBeNull();
});

it('validates quote_author_id is required', function () {
    Livewire::test(CreateQuote::class)
        ->fillForm(['quote_author_id' => null, 'body' => 'Test'])
        ->call('create')
        ->assertHasFormErrors(['quote_author_id' => 'required']);
});

it('validates body is required', function () {
    $author = QuoteAuthor::factory()->create();

    Livewire::test(CreateQuote::class)
        ->fillForm(['quote_author_id' => $author->id, 'body' => ''])
        ->call('create')
        ->assertHasFormErrors(['body' => 'required']);
});

it('can bulk delete quotes', function () {
    $quotes = Quote::factory()->count(3)->create();

    Livewire::test(ListQuotes::class)
        ->callTableBulkAction('delete', $quotes);

    foreach ($quotes as $quote) {
        expect($quote->fresh()->deleted_at)->not->toBeNull();
    }
});
