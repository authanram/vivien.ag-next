<?php

use App\Models\Event;
use App\Models\EventType;
use App\Models\Image;
use App\Models\ImageCoordinates;
use App\Models\Quote;
use App\Models\QuoteAuthor;

it('event type has many events', function () {
    $eventType = EventType::factory()->create();
    Event::factory()->count(2)->create(['event_type_id' => $eventType->id]);

    expect($eventType->events)->toHaveCount(2);
});

it('quote author has many quotes', function () {
    $author = QuoteAuthor::factory()->create();
    Quote::factory()->count(2)->create(['quote_author_id' => $author->id]);

    expect($author->quotes)->toHaveCount(2);
});

it('image has one image coordinates', function () {
    $image = Image::factory()->create();
    ImageCoordinates::factory()->create(['image_id' => $image->id]);

    expect($image->imageCoordinates)->not->toBeNull();
    expect($image->imageCoordinates)->toBeInstanceOf(ImageCoordinates::class);
});
