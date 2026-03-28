<?php

use App\Enums\ImageArtist;
use App\Filament\Resources\Images\Pages\CreateImage;
use App\Filament\Resources\Images\Pages\EditImage;
use App\Filament\Resources\Images\Pages\ListImages;
use App\Models\Image;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListImages::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateImage::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->assertSuccessful();
});

it('can list images', function () {
    $images = Image::factory()->count(3)->create();

    Livewire::test(ListImages::class)
        ->assertCanSeeTableRecords($images);
});

it('can create an image with required fields only', function () {
    Livewire::test(CreateImage::class)
        ->fillForm([
            'published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, [
        'published' => true,
    ]);
});

it('can create an image with all fields', function () {
    Livewire::test(CreateImage::class)
        ->fillForm([
            'title' => 'Testbild',
            'description' => 'Ein Testbild',
            'price' => 150,
            'published' => false,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, ['title' => 'Testbild']);
});

it('can retrieve an image for editing', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->assertSchemaStateSet([
            'title' => $image->title,
            'description' => $image->description,
        ]);
});

it('can update an image', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->fillForm(['title' => 'Updated Image'])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, ['id' => $image->id, 'title' => 'Updated Image']);
});

it('can delete an image', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->callAction(DeleteAction::class);

    expect($image->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete an image', function () {
    $image = Image::factory()->create();
    $image->delete();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(Image::withTrashed()->find($image->id))->toBeNull();
});

it('can restore an image', function () {
    $image = Image::factory()->create();
    $image->delete();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->callAction(RestoreAction::class);

    expect($image->fresh()->deleted_at)->toBeNull();
});

it('can search images by name', function () {
    $target = Image::factory()->create(['title' => 'Sonnenuntergang']);
    $other = Image::factory()->create(['title' => 'Berge']);

    Livewire::test(ListImages::class)
        ->searchTable('Sonnenuntergang')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('can search images by description', function () {
    $target = Image::factory()->create(['description' => 'Einzigartige Landschaft']);
    $other = Image::factory()->create(['description' => 'Stadtbild']);

    Livewire::test(ListImages::class)
        ->searchTable('Einzigartige')
        ->assertCanSeeTableRecords([$target])
        ->assertCanNotSeeTableRecords([$other]);
});

it('can create an image with artist', function () {
    Livewire::test(CreateImage::class)
        ->fillForm([
            'artist' => ImageArtist::RobertSeuffer->value,
            'published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, [
        'artist' => 'robert_seuffer',
    ]);
});

it('can create an image with custom artist', function () {
    Livewire::test(CreateImage::class)
        ->fillForm([
            'artist' => ImageArtist::Other->value,
            'artist_custom' => 'Pablo Picasso',
            'published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, [
        'artist' => 'other',
        'artist_custom' => 'Pablo Picasso',
    ]);
});

it('displays custom artist in table', function () {
    $image = Image::factory()->create([
        'artist' => ImageArtist::Other->value,
        'artist_custom' => 'Pablo Picasso',
    ]);

    Livewire::test(ListImages::class)
        ->assertCanSeeTableRecords([$image]);
});
