<?php

use App\Mail\AttendeeRegisteredMail;
use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

beforeEach(function () {
    Mail::fake();

    $this->eventType = EventType::create([
        'uuid' => Str::uuid(),
        'name' => 'Test Seminar',
        'color' => 'rose',
    ]);

    $this->event = Event::create([
        'uuid' => Str::uuid(),
        'event_type_id' => $this->eventType->id,
        'event_location' => 'jaegerstrasse',
        'date_from' => Carbon::now()->addDays(10),
        'date_to' => Carbon::now()->addDays(10)->addHours(2),
        'maximum_attendees' => 10,
        'reserved_seats' => 0,
        'price' => 2500,
        'lead' => 'Sybille Seuffer',
        'published' => true,
    ]);
});

test('besucher kann seminar-detailseite aufrufen', function () {
    $response = $this->get("/seminare/{$this->event->uuid}");
    $response->assertOk();
});

test('besucher kann sich für ein seminar anmelden', function () {
    $response = $this->post("/seminare/{$this->event->uuid}/anmelden", [
        'salutation' => 'Mrs',
        'firstname' => 'Anna',
        'surname' => 'Muster',
        'phone' => '012345678',
        'email' => 'anna@example.com',
        'attendance' => 2,
    ]);

    $response->assertRedirect("/seminare/{$this->event->uuid}");
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('event_attendees', [
        'event_id' => $this->event->id,
        'email' => 'anna@example.com',
        'firstname' => 'Anna',
        'attendance' => 2,
    ]);

    Mail::assertQueued(AttendeeRegisteredMail::class, function ($mail) {
        return $mail->attendee->email === 'anna@example.com';
    });
});

test('anmeldung ohne pflichtfelder schlägt fehl', function () {
    $response = $this->post("/seminare/{$this->event->uuid}/anmelden", [
        'salutation' => 'Mrs',
        'firstname' => '',
        'surname' => '',
        'email' => 'keine-email',
        'attendance' => 1,
    ]);

    $response->assertSessionHasErrors(['firstname', 'surname', 'email']);
    $this->assertDatabaseCount('event_attendees', 0);
    Mail::assertNothingQueued();
});

test('anmeldung schlägt fehl wenn seminar ausgebucht ist', function () {
    EventAttendee::create([
        'uuid' => Str::uuid(),
        'event_id' => $this->event->id,
        'salutation' => 'Mrs',
        'firstname' => 'Bereits',
        'surname' => 'Belegt',
        'phone' => '',
        'email' => 'belegt@example.com',
        'attendance' => 10,
        'confirmed' => true,
    ]);

    $response = $this->post("/seminare/{$this->event->uuid}/anmelden", [
        'salutation' => 'Mrs',
        'firstname' => 'Neu',
        'surname' => 'Anmelder',
        'email' => 'neu@example.com',
        'attendance' => 1,
    ]);

    $response->assertSessionHasErrors(['attendance']);
    Mail::assertNothingQueued();
});

test('unveröffentlichte seminare geben 404 zurück (GET)', function () {
    $this->event->update(['published' => false]);

    $this->get("/seminare/{$this->event->uuid}")->assertNotFound();
});

test('unveröffentlichte seminare geben 404 zurück (POST)', function () {
    $this->event->update(['published' => false]);

    $this->post("/seminare/{$this->event->uuid}/anmelden", [
        'salutation' => 'Mrs',
        'firstname' => 'Anna',
        'surname' => 'Muster',
        'email' => 'anna@example.com',
        'attendance' => 1,
    ])->assertNotFound();
});

test('seminar-liste zeigt nur veröffentlichte events', function () {
    $unpublished = Event::create([
        'uuid' => Str::uuid(),
        'event_type_id' => $this->eventType->id,
        'event_location' => 'jaegerstrasse',
        'date_from' => Carbon::now()->addDays(5),
        'date_to' => Carbon::now()->addDays(5)->addHours(2),
        'maximum_attendees' => 8,
        'published' => false,
    ]);

    $response = $this->get('/seminare');
    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('public/Seminare')
        ->where('events.data', fn ($events) => collect($events)->every(fn ($e) => $e['uuid'] !== $unpublished->uuid))
    );
});
