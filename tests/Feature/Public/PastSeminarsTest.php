<?php

use App\Models\Event;
use App\Models\EventAttendee;
use Inertia\Testing\AssertableInertia as Assert;

beforeEach(function () {
    $this->upcoming = Event::factory()->create([
        'published' => true,
        'date_from' => now()->addDays(3),
        'date_to' => now()->addDays(3)->addHours(2),
    ]);

    $this->past = Event::factory()->create([
        'published' => true,
        'date_from' => now()->subDays(3),
        'date_to' => now()->subDays(3)->addHours(2),
    ]);
});

test('die seminarliste zeigt nur kommende seminare', function () {
    $this->get('/seminare')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->has('events.data', 1)
            ->where('events.data.0.uuid', (string) $this->upcoming->uuid)
        );
});

test('kürzlich veröffentlicht zeigt keine vergangenen seminare', function () {
    $this->get('/portrait')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->has('recentEvents.data', 1)
            ->where('recentEvents.data.0.uuid', (string) $this->upcoming->uuid)
        );
});

test('vergangene seminare haben keine detailseite', function () {
    $this->get("/seminare/{$this->past->uuid}")->assertNotFound();
});

test('für vergangene seminare ist keine anmeldung möglich', function () {
    $this->post("/seminare/{$this->past->uuid}/anmelden", [
        'salutation' => 'Mrs',
        'firstname' => 'Anna',
        'surname' => 'Muster',
        'email' => 'anna@example.com',
        'attendance' => 1,
    ])->assertNotFound();

    expect(EventAttendee::count())->toBe(0);
});
