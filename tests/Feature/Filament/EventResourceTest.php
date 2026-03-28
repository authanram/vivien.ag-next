<?php

use App\Enums\Color;
use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Filament\Resources\Events\Pages\CreateEvent;
use App\Filament\Resources\Events\Pages\EditEvent;
use App\Filament\Resources\Events\Pages\ListEvents;
use App\Models\Event;
use App\Models\EventType;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

// === Page Rendering ===

it('can render the list page', function () {
    Livewire::test(ListEvents::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateEvent::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $event = Event::factory()->create();

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->assertSuccessful();
});

// === CRUD ===

it('can list events', function () {
    $events = Event::factory()->count(3)->create();

    Livewire::test(ListEvents::class)
        ->assertCanSeeTableRecords($events);
});

it('can create an event with required fields', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => $eventType->id,
            'event_location' => EventLocation::Jaegerstrasse->value,
            'date_from' => now()->addDays(10)->format('Y-m-d H:i:s'),
            'date_to' => now()->addDays(10)->addHours(2)->format('Y-m-d H:i:s'),
            'maximum_attendees' => 10,
            'published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Event::class, [
        'event_type_id' => $eventType->id,
        'event_location' => EventLocation::Jaegerstrasse->value,
        'maximum_attendees' => 10,
    ]);
});

it('can create an event with all fields', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => $eventType->id,
            'event_day' => Weekday::Saturday->value,
            'event_location' => EventLocation::Jaegerstrasse->value,
            'description' => 'Eine tolle Beschreibung',
            'date_from' => now()->addDays(10)->format('Y-m-d H:i:s'),
            'date_to' => now()->addDays(10)->addHours(4)->format('Y-m-d H:i:s'),
            'maximum_attendees' => 12,
            'reserved_seats' => 2,
            'price' => 3500,
            'lead' => 'Sybille Seuffer',
            'price_note' => 'Inkl. Material',
            'published' => true,
            'catering_including_food' => true,
            'catering_including_drinks' => true,
            'catering_robys_catering' => false,
            'catering_dining_out' => false,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $event = Event::latest()->first();
    expect($event)
        ->event_type_id->toBe($eventType->id)
        ->event_day->toBe(Weekday::Saturday)
        ->maximum_attendees->toBe(12)
        ->reserved_seats->toBe(2);
    expect($event->catering)->toContain('including_food', 'including_drinks');
});

it('converts catering checkboxes to array on create', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => $eventType->id,
            'event_location' => EventLocation::Jaegerstrasse->value,
            'date_from' => now()->addDays(10)->format('Y-m-d H:i:s'),
            'date_to' => now()->addDays(10)->addHours(2)->format('Y-m-d H:i:s'),
            'maximum_attendees' => 10,
            'published' => true,
            'catering_including_food' => true,
            'catering_robys_catering' => true,
            'catering_including_drinks' => false,
            'catering_dining_out' => false,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $event = Event::latest()->first();
    expect($event->catering)->toBe(['including_food', 'robys_catering']);
});

it('converts catering checkboxes to array on update', function () {
    $event = Event::factory()->create([
        'catering' => ['including_food'],
        'event_location' => EventLocation::Jaegerstrasse,
    ]);

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->fillForm([
            'catering_including_food' => false,
            'catering_dining_out' => true,
            'catering_including_drinks' => false,
            'catering_robys_catering' => false,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($event->fresh()->catering)->toBe(['dining_out']);
});

it('can retrieve an event for editing', function () {
    $event = Event::factory()->create();

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->assertSchemaStateSet([
            'event_type_id' => $event->event_type_id,
            'event_location' => $event->event_location->value,
            'maximum_attendees' => $event->maximum_attendees,
        ]);
});

it('can update an event', function () {
    $event = Event::factory()->create(['event_location' => EventLocation::Jaegerstrasse]);

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->fillForm([
            'maximum_attendees' => 20,
            'lead' => 'Updated Lead',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Event::class, [
        'id' => $event->id,
        'maximum_attendees' => 20,
        'lead' => 'Updated Lead',
    ]);
});

it('can delete an event', function () {
    $event = Event::factory()->create();

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->callAction(DeleteAction::class);

    expect($event->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete an event', function () {
    $event = Event::factory()->create();
    $event->delete();

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(Event::withTrashed()->find($event->id))->toBeNull();
});

it('can restore an event', function () {
    $event = Event::factory()->create();
    $event->delete();

    Livewire::test(EditEvent::class, ['record' => $event->uuid])
        ->callAction(RestoreAction::class);

    expect($event->fresh()->deleted_at)->toBeNull();
});

// === Conditional Fields ===

it('shows custom_event_location when event_location is Other', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['event_location' => EventLocation::Other->value])
        ->assertFormFieldIsVisible('custom_event_location');
});

it('hides custom_event_location when event_location is not Other', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['event_location' => EventLocation::Jaegerstrasse->value])
        ->assertFormFieldIsHidden('custom_event_location');
});

it('sets description from event type', function () {
    $eventType = EventType::factory()->create([
        'description' => 'Auto-populated description',
    ]);

    Livewire::test(CreateEvent::class)
        ->fillForm(['event_type_id' => $eventType->id])
        ->assertSchemaStateSet(['description' => 'Auto-populated description']);
});

// === Validation ===

it('validates event_type_id is required', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['event_type_id' => null])
        ->call('create')
        ->assertHasFormErrors(['event_type_id' => 'required']);
});

it('validates event_location is required', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['event_location' => null])
        ->call('create')
        ->assertHasFormErrors(['event_location' => 'required']);
});

it('validates date_from is required', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['date_from' => null])
        ->call('create')
        ->assertHasFormErrors(['date_from' => 'required']);
});

it('validates date_to is required', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['date_to' => null])
        ->call('create')
        ->assertHasFormErrors(['date_to' => 'required']);
});

it('validates date_to is after or equal to date_from', function () {
    $eventType = EventType::factory()->create();

    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => $eventType->id,
            'event_location' => EventLocation::Jaegerstrasse->value,
            'date_from' => now()->addDays(10)->format('Y-m-d H:i:s'),
            'date_to' => now()->addDays(9)->format('Y-m-d H:i:s'),
            'maximum_attendees' => 10,
            'published' => true,
        ])
        ->call('create')
        ->assertHasFormErrors(['date_to']);
});

it('validates maximum_attendees is required', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm(['maximum_attendees' => null])
        ->call('create')
        ->assertHasFormErrors(['maximum_attendees' => 'required']);
});

// === Filters ===

it('can filter events by event type', function () {
    $type1 = EventType::factory()->create();
    $type2 = EventType::factory()->create();
    $event1 = Event::factory()->create(['event_type_id' => $type1->id]);
    $event2 = Event::factory()->create(['event_type_id' => $type2->id]);

    Livewire::test(ListEvents::class)
        ->filterTable('event_type_id', $type1->id)
        ->assertCanSeeTableRecords([$event1])
        ->assertCanNotSeeTableRecords([$event2]);
});

it('can filter events by event location', function () {
    $event1 = Event::factory()->create(['event_location' => EventLocation::Jaegerstrasse]);
    $event2 = Event::factory()->create(['event_location' => EventLocation::AtHome]);

    Livewire::test(ListEvents::class)
        ->filterTable('event_location', EventLocation::Jaegerstrasse->value)
        ->assertCanSeeTableRecords([$event1])
        ->assertCanNotSeeTableRecords([$event2]);
});

it('can filter events by event day', function () {
    $event1 = Event::factory()->create(['event_day' => Weekday::Monday]);
    $event2 = Event::factory()->create(['event_day' => Weekday::Friday]);

    Livewire::test(ListEvents::class)
        ->filterTable('event_day', Weekday::Monday->value)
        ->assertCanSeeTableRecords([$event1])
        ->assertCanNotSeeTableRecords([$event2]);
});

it('can filter events by catering', function () {
    $event1 = Event::factory()->create(['catering' => ['including_food', 'including_drinks']]);
    $event2 = Event::factory()->create(['catering' => ['dining_out']]);

    Livewire::test(ListEvents::class)
        ->filterTable('catering', 'including_food')
        ->assertCanSeeTableRecords([$event1])
        ->assertCanNotSeeTableRecords([$event2]);
});

it('can filter events by published status', function () {
    $published = Event::factory()->create(['published' => true]);
    $unpublished = Event::factory()->create(['published' => false]);

    Livewire::test(ListEvents::class)
        ->filterTable('published', true)
        ->assertCanSeeTableRecords([$published])
        ->assertCanNotSeeTableRecords([$unpublished]);
});

// === Actions ===

it('can replicate an event', function () {
    $event = Event::factory()->create();

    Livewire::test(ListEvents::class)
        ->callTableAction(ReplicateAction::class, $event);

    expect(Event::count())->toBe(2);

    $replica = Event::where('id', '!=', $event->id)->first();
    expect($replica)
        ->event_type_id->toBe($event->event_type_id)
        ->maximum_attendees->toBe($event->maximum_attendees)
        ->uuid->not->toBe($event->uuid);
});

it('can create an event type inline via createOptionUsing', function () {
    Livewire::test(CreateEvent::class)
        ->fillForm([
            'event_type_id' => null,
        ])
        ->callFormComponentAction('event_type_id', 'createOption', data: [
            'name' => 'Neue Seminarart',
            'color' => Color::Blue->value,
            'description' => 'Inline erstellt',
        ]);

    $this->assertDatabaseHas(EventType::class, [
        'name' => 'Neue Seminarart',
        'color' => Color::Blue->value,
    ]);
});

it('can search events by event type name', function () {
    $type = EventType::factory()->create(['name' => 'Schreibwerkstatt Spezial']);
    $target = Event::factory()->create(['event_type_id' => $type->id]);
    $other = Event::factory()->create();

    Livewire::test(ListEvents::class)
        ->searchTable('Schreibwerkstatt Spezial')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('can search events by weekday label', function () {
    $target = Event::factory()->create(['event_day' => Weekday::Monday]);
    $other = Event::factory()->create(['event_day' => Weekday::Friday]);

    Livewire::test(ListEvents::class)
        ->searchTable('Montag')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('can search events by event location label', function () {
    $target = Event::factory()->create(['event_location' => EventLocation::Jaegerstrasse]);
    $other = Event::factory()->create(['event_location' => EventLocation::AtHome]);

    Livewire::test(ListEvents::class)
        ->searchTable('Spielberg')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('displays event location in table description', function () {
    $event = Event::factory()->create([
        'event_location' => EventLocation::Other,
        'custom_event_location' => 'Kloster Kirchberg',
    ]);

    Livewire::test(ListEvents::class)
        ->assertCanSeeTableRecords([$event]);
});
