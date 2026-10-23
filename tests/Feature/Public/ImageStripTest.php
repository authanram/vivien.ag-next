<?php

use App\Enums\ImageArtist;
use App\Models\Image;
use App\Models\ImageCoordinates;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;

beforeEach(function () {
    Storage::fake('public');
});

function imageStripImage(array $attributes): Image
{
    $image = Image::factory()->create($attributes);
    $image->addMedia(UploadedFile::fake()->image('bild.jpg'))->toMediaCollection('image');
    ImageCoordinates::factory()->create(['image_id' => $image->id, 'active' => true]);

    return $image;
}

it('shares the image details with the image strip', function () {
    imageStripImage([
        'title' => 'Herzen',
        'description' => 'Acryl auf Leinwand',
        'price' => 17700,
        'artist' => ImageArtist::SybilleSeuffer,
    ]);

    $this->get('/')->assertInertia(fn (Assert $page) => $page
        ->where('imageStrip.0.title', 'Herzen')
        ->where('imageStrip.0.description', 'Acryl auf Leinwand')
        ->where('imageStrip.0.price', 17700)
        ->where('imageStrip.0.artist', 'Sybille Seuffer')
    );
});

it('shares no price when the image has none', function () {
    imageStripImage(['price' => 0]);

    $this->get('/')->assertInertia(fn (Assert $page) => $page
        ->where('imageStrip.0.price', null)
    );
});

it('shares the custom artist name for other artists', function () {
    imageStripImage(['artist' => ImageArtist::Other, 'artist_custom' => 'Paula Modersohn']);

    $this->get('/')->assertInertia(fn (Assert $page) => $page
        ->where('imageStrip.0.artist', 'Paula Modersohn')
    );
});
