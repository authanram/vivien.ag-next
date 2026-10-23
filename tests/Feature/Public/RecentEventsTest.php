<?php

use App\Models\Event;
use Inertia\Testing\AssertableInertia as Assert;

test('jede öffentliche seite teilt die zuletzt veröffentlichten seminare', function () {
    $newest = Event::factory()->create(['published' => true, 'created_at' => now()]);
    Event::factory()->count(3)->create(['published' => true, 'created_at' => now()->subDays(2)]);
    Event::factory()->create(['published' => false, 'created_at' => now()->addMinute()]);

    $this->get('/portrait')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->has('recentEvents.data', 3)
            ->where('recentEvents.data.0.uuid', (string) $newest->uuid)
        );
});

test('startseite erhält die recent events über die geteilten props', function () {
    $this->get('/')
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('public/Home')
            ->has('upcomingEvents')
            ->has('recentEvents')
        );
});
