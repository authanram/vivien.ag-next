<?php

use App\Enums\Weekday;
use App\Filament\Widgets\EventsByDayChart;
use App\Filament\Widgets\EventsStatsOverview;
use App\Filament\Widgets\PopularEventTypesChart;
use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventType;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the events stats overview widget', function () {
    Livewire::test(EventsStatsOverview::class)->assertSuccessful();
});

it('displays correct event count stats', function () {
    Event::factory()->count(3)->create(['date_from' => now()->addDays(5)]);
    Event::factory()->count(2)->create(['date_from' => now()->subDays(5)]);

    $component = Livewire::test(EventsStatsOverview::class);

    $component->assertSee('5');
    $component->assertSee('3');
});

it('displays correct attendance count', function () {
    $event = Event::factory()->create(['date_from' => now()->addDays(5)]);
    EventAttendee::factory()->create(['event_id' => $event->id, 'attendance' => 3, 'confirmed' => true]);
    EventAttendee::factory()->create(['event_id' => $event->id, 'attendance' => 2, 'confirmed' => true]);

    $component = Livewire::test(EventsStatsOverview::class);
    $component->assertSee('5');
});

it('calculates planned revenue correctly', function () {
    Event::factory()->create([
        'date_from' => now()->addDays(5),
        'price' => 1000,
        'maximum_attendees' => 10,
    ]);

    $component = Livewire::test(EventsStatsOverview::class);
    $component->assertSee('100,00');
});

it('can render the events by day chart with data', function () {
    Event::factory()->create(['event_day' => Weekday::Monday]);
    Event::factory()->create(['event_day' => Weekday::Monday]);
    Event::factory()->create(['event_day' => Weekday::Friday]);

    Livewire::test(EventsByDayChart::class)->assertSuccessful();
});

it('can render the popular event types chart with data', function () {
    $type1 = EventType::factory()->create();
    $type2 = EventType::factory()->create();
    Event::factory()->count(3)->create(['event_type_id' => $type1->id]);
    Event::factory()->count(2)->create(['event_type_id' => $type2->id]);

    Livewire::test(PopularEventTypesChart::class)->assertSuccessful();
});

it('can render the events by day chart without data', function () {
    Livewire::test(EventsByDayChart::class)->assertSuccessful();
});

it('can render the popular event types chart without data', function () {
    Livewire::test(PopularEventTypesChart::class)->assertSuccessful();
});
