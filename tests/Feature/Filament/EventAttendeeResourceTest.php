<?php

use App\Enums\Salutation;
use App\Filament\Resources\EventAttendees\Pages\CreateEventAttendee;
use App\Filament\Resources\EventAttendees\Pages\EditEventAttendee;
use App\Filament\Resources\EventAttendees\Pages\ListEventAttendees;
use App\Models\Event;
use App\Models\EventAttendee;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListEventAttendees::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateEventAttendee::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->assertSuccessful();
});

it('can list event attendees', function () {
    $attendees = EventAttendee::factory()->count(3)->for(Event::factory())->create();

    Livewire::test(ListEventAttendees::class)
        ->assertCanSeeTableRecords($attendees);
});

it('can create an attendee with required fields', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mr->value,
            'firstname' => 'Max',
            'surname' => 'Mustermann',
            'phone' => '0711 1234567',
            'email' => 'max@example.com',
            'attendance' => 2,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventAttendee::class, [
        'event_id' => $event->id,
        'firstname' => 'Max',
        'surname' => 'Mustermann',
    ]);
});

it('can create an attendee with all fields', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mrs->value,
            'firstname' => 'Erika',
            'surname' => 'Musterfrau',
            'phone' => '0711 9876543',
            'email' => 'erika@example.com',
            'attendance' => 1,
            'message' => 'Freue mich auf das Seminar!',
            'confirmed' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventAttendee::class, [
        'firstname' => 'Erika',
        'message' => 'Freue mich auf das Seminar!',
    ]);
});

it('defaults confirmed to true', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mr->value,
            'firstname' => 'Test',
            'surname' => 'User',
            'phone' => '0711 0000000',
            'email' => 'test@example.com',
            'attendance' => 1,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $attendee = EventAttendee::latest()->first();
    expect($attendee->confirmed)->toBeTrue();
});

it('defaults attendance to 1', function () {
    Livewire::test(CreateEventAttendee::class)
        ->assertSchemaStateSet(['attendance' => 1]);
});

it('can retrieve an attendee for editing', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->assertSchemaStateSet([
            'firstname' => $attendee->firstname,
            'surname' => $attendee->surname,
            'email' => $attendee->email,
        ]);
});

it('can update an attendee', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->fillForm([
            'firstname' => 'Updated',
            'surname' => 'Name',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(EventAttendee::class, [
        'id' => $attendee->id,
        'firstname' => 'Updated',
        'surname' => 'Name',
    ]);
});

it('can delete an attendee', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->callAction(DeleteAction::class);

    expect($attendee->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete an attendee', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();
    $attendee->delete();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(EventAttendee::withTrashed()->find($attendee->id))->toBeNull();
});

it('can restore an attendee', function () {
    $attendee = EventAttendee::factory()->for(Event::factory())->create();
    $attendee->delete();

    Livewire::test(EditEventAttendee::class, ['record' => $attendee->uuid])
        ->callAction(RestoreAction::class);

    expect($attendee->fresh()->deleted_at)->toBeNull();
});

it('validates salutation is required', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => null,
            'firstname' => 'Test',
            'surname' => 'User',
            'phone' => '0711',
            'email' => 'test@test.com',
        ])
        ->call('create')
        ->assertHasFormErrors(['salutation' => 'required']);
});

it('validates firstname is required', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mr->value,
            'firstname' => '',
            'surname' => 'User',
            'phone' => '0711',
            'email' => 'test@test.com',
        ])
        ->call('create')
        ->assertHasFormErrors(['firstname' => 'required']);
});

it('validates surname is required', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mr->value,
            'firstname' => 'Test',
            'surname' => '',
            'phone' => '0711',
            'email' => 'test@test.com',
        ])
        ->call('create')
        ->assertHasFormErrors(['surname' => 'required']);
});

it('validates email is required', function () {
    $event = Event::factory()->create();

    Livewire::test(CreateEventAttendee::class)
        ->fillForm([
            'event_id' => $event->id,
            'salutation' => Salutation::Mr->value,
            'firstname' => 'Test',
            'surname' => 'User',
            'phone' => '0711',
            'email' => '',
        ])
        ->call('create')
        ->assertHasFormErrors(['email' => 'required']);
});
