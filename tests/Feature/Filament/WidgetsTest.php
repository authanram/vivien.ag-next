<?php

use App\Enums\Weekday;
use App\Filament\Resources\Images\Widgets\ImageStripPreview;
use App\Filament\Widgets\EventsByDayChart;
use App\Filament\Widgets\EventsStatsOverview;
use App\Filament\Widgets\PopularEventTypesChart;
use App\Models\Event;
use App\Models\EventAttendee;
use App\Models\EventType;
use App\Models\Image;
use App\Models\ImageCoordinates;
use Illuminate\Support\Str;
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

it('can render the image strip preview widget', function () {
    Livewire::test(ImageStripPreview::class)
        ->assertSuccessful();
});

it('can render the image strip preview with images', function () {
    $image = Image::factory()->create();
    ImageCoordinates::factory()->create([
        'image_id' => $image->id,
        'active' => true,
    ]);

    Livewire::test(ImageStripPreview::class)
        ->assertSuccessful();
});

function imageWithMedia(string $title): Image
{
    $image = Image::factory()->create(['title' => $title]);

    // A media row is enough for the preview URL; a real upload is too heavy for the suite.
    $image->media()->create([
        'uuid' => Str::uuid(),
        'collection_name' => 'image',
        'name' => $title,
        'file_name' => "{$title}.jpg",
        'mime_type' => 'image/jpeg',
        'disk' => 'public',
        'size' => 1,
        'manipulations' => [],
        'custom_properties' => [],
        'generated_conversions' => [],
        'responsive_images' => [],
    ]);

    return $image;
}

it('updates the edited image strip entry live, including a swapped image', function () {
    $original = imageWithMedia('Original');
    $replacement = imageWithMedia('Ersatz');
    $entry = ImageCoordinates::factory()->create(['image_id' => $original->id, 'active' => true]);

    Livewire::test(ImageStripPreview::class, ['currentCoordinatesId' => $entry->id])
        ->assertSee('alt="Original"', false)
        ->dispatch('preview-updated', data: [
            'image_id' => $replacement->id,
            'top' => 50,
            'left' => -100,
            'height' => 150,
            'active' => true,
        ])
        ->assertSee('alt="Ersatz"', false)
        ->assertDontSee('alt="Original"', false)
        ->assertSee('top: 50px', false);
});

it('hides the edited entry live when it is switched inactive', function () {
    $image = imageWithMedia('Herzen');
    $entry = ImageCoordinates::factory()->create(['image_id' => $image->id, 'active' => true]);

    Livewire::test(ImageStripPreview::class, ['currentCoordinatesId' => $entry->id])
        ->dispatch('preview-updated', data: ['image_id' => $image->id, 'active' => false])
        ->assertDontSee('alt="Herzen"', false);
});

it('adds the entry being created to the preview', function () {
    imageWithMedia('Bestehend');
    ImageCoordinates::factory()->create(['image_id' => Image::first()->id, 'active' => true]);
    $new = imageWithMedia('Neu');

    Livewire::test(ImageStripPreview::class)
        ->assertDontSee('alt="Neu"', false)
        ->dispatch('preview-updated', data: ['image_id' => $new->id, 'active' => true])
        ->assertSee('alt="Neu"', false)
        ->assertSee('alt="Bestehend"', false);
});
