<?php

use App\Enums\Color;
use App\Filament\Resources\EventTypes\Pages\CreateEventType;
use App\Filament\Resources\EventTypes\Pages\EditEventType;
use App\Filament\Resources\EventTypes\Pages\ListEventTypes;
use App\Models\EventType;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListEventTypes::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateEventType::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->assertSuccessful();
});

it('can list event types', function () {
    $eventTypes = EventType::factory()->count(3)->create();

    Livewire::test(ListEventTypes::class)
        ->assertCanSeeTableRecords($eventTypes);
});

it('can create an event type with required fields only', function () {
    Livewire::test(CreateEventType::class)
        ->fillForm([
            'name' => 'Schreibwerkstatt',
            'color' => Color::Blue->value,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventType::class, [
        'name' => 'Schreibwerkstatt',
        'color' => Color::Blue->value,
    ]);
});

it('can create an event type with all fields', function () {
    Livewire::test(CreateEventType::class)
        ->fillForm([
            'name' => 'Malwerkstatt',
            'color' => Color::Amber->value,
            'description' => 'Intuitives Malen ohne Vorkenntnisse.',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventType::class, [
        'name' => 'Malwerkstatt',
        'color' => Color::Amber->value,
        'description' => 'Intuitives Malen ohne Vorkenntnisse.',
    ]);
});

it('can retrieve an event type for editing', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->assertSchemaStateSet([
            'name' => $eventType->name,
            'color' => $eventType->color,
            'description' => $eventType->description,
        ]);
});

it('can update an event type', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->fillForm([
            'name' => 'Updated Name',
            'color' => Color::Green->value,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventType::class, [
        'id' => $eventType->id,
        'name' => 'Updated Name',
        'color' => Color::Green->value,
    ]);
});

it('can delete an event type', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->callAction(DeleteAction::class);

    expect($eventType->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete an event type', function () {
    $eventType = EventType::factory()->create();
    $eventType->delete();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(EventType::withTrashed()->find($eventType->id))->toBeNull();
});

it('can restore an event type', function () {
    $eventType = EventType::factory()->create();
    $eventType->delete();

    Livewire::test(EditEventType::class, ['record' => $eventType->uuid])
        ->callAction(RestoreAction::class);

    expect($eventType->fresh()->deleted_at)->toBeNull();
});

it('can search event types by name', function () {
    $target = EventType::factory()->create(['name' => 'Paargruppe Spezial']);
    $other = EventType::factory()->create(['name' => 'Frauengruppe']);

    Livewire::test(ListEventTypes::class)
        ->searchTable('Paargruppe')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('can sort event types by name', function () {
    EventType::factory()->create(['name' => 'Zebra']);
    EventType::factory()->create(['name' => 'Alpha']);

    Livewire::test(ListEventTypes::class)
        ->sortTable('name')
        ->assertCanSeeTableRecords(EventType::orderBy('name')->get(), inOrder: true);
});

it('validates name is required', function () {
    Livewire::test(CreateEventType::class)
        ->fillForm(['name' => '', 'color' => Color::Blue->value])
        ->call('create')
        ->assertHasFormErrors(['name' => 'required']);
});

it('validates color is required', function () {
    Livewire::test(CreateEventType::class)
        ->fillForm(['name' => 'Test', 'color' => null])
        ->call('create')
        ->assertHasFormErrors(['color' => 'required']);
});

it('can bulk delete event types', function () {
    $eventTypes = EventType::factory()->count(3)->create();

    Livewire::test(ListEventTypes::class)
        ->callTableBulkAction('delete', $eventTypes);

    foreach ($eventTypes as $eventType) {
        expect($eventType->fresh()->deleted_at)->not->toBeNull();
    }
});
