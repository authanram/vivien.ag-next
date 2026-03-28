<?php

use App\Filament\Resources\ImageCoordinates\Pages\CreateImageCoordinates;
use App\Filament\Resources\ImageCoordinates\Pages\EditImageCoordinates;
use App\Filament\Resources\ImageCoordinates\Pages\ListImageCoordinates;
use App\Models\Image;
use App\Models\ImageCoordinates;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListImageCoordinates::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreateImageCoordinates::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $coords = ImageCoordinates::factory()->create();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->assertSuccessful();
});

it('can list image coordinates', function () {
    $coords = ImageCoordinates::factory()->count(3)->create();

    Livewire::test(ListImageCoordinates::class)
        ->assertCanSeeTableRecords($coords);
});

it('can create image coordinates', function () {
    $image = Image::factory()->create();

    Livewire::test(CreateImageCoordinates::class)
        ->fillForm([
            'image_id' => $image->id,
            'coordinates' => '{"x": 0.5, "y": 0.3}',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(ImageCoordinates::class, ['image_id' => $image->id]);
});

it('can retrieve image coordinates for editing', function () {
    $coords = ImageCoordinates::factory()->create();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->assertSchemaStateSet([
            'image_id' => $coords->image_id,
        ]);
});

it('can update image coordinates', function () {
    $coords = ImageCoordinates::factory()->create();
    $newImage = Image::factory()->create();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->fillForm(['image_id' => $newImage->id])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(ImageCoordinates::class, ['id' => $coords->id, 'image_id' => $newImage->id]);
});

it('can delete image coordinates', function () {
    $coords = ImageCoordinates::factory()->create();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->callAction(DeleteAction::class);

    expect($coords->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete image coordinates', function () {
    $coords = ImageCoordinates::factory()->create();
    $coords->delete();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(ImageCoordinates::withTrashed()->find($coords->id))->toBeNull();
});

it('can restore image coordinates', function () {
    $coords = ImageCoordinates::factory()->create();
    $coords->delete();

    Livewire::test(EditImageCoordinates::class, ['record' => $coords->uuid])
        ->callAction(RestoreAction::class);

    expect($coords->fresh()->deleted_at)->toBeNull();
});

it('validates image_id is required', function () {
    Livewire::test(CreateImageCoordinates::class)
        ->fillForm(['image_id' => null, 'coordinates' => '{"x": 1}'])
        ->call('create')
        ->assertHasFormErrors(['image_id' => 'required']);
});

it('validates coordinates is required', function () {
    $image = Image::factory()->create();

    Livewire::test(CreateImageCoordinates::class)
        ->fillForm(['image_id' => $image->id, 'coordinates' => ''])
        ->call('create')
        ->assertHasFormErrors(['coordinates' => 'required']);
});
