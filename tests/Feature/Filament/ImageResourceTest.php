<?php

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
            'order_column' => 1,
            'published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, [
        'order_column' => 1,
        'published' => true,
    ]);
});

it('can create an image with all fields', function () {
    Livewire::test(CreateImage::class)
        ->fillForm([
            'name' => 'Testbild',
            'description' => 'Ein Testbild',
            'price' => 150,
            'order_column' => 2,
            'published' => false,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, ['name' => 'Testbild']);
});

it('can retrieve an image for editing', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->assertSchemaStateSet([
            'name' => $image->name,
            'description' => $image->description,
            'order_column' => $image->order_column,
        ]);
});

it('can update an image', function () {
    $image = Image::factory()->create();

    Livewire::test(EditImage::class, ['record' => $image->uuid])
        ->fillForm(['name' => 'Updated Image', 'order_column' => 5])
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Image::class, ['id' => $image->id, 'name' => 'Updated Image']);
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
    $target = Image::factory()->create(['name' => 'Sonnenuntergang']);
    $other = Image::factory()->create(['name' => 'Berge']);

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

it('validates order_column is required', function () {
    Livewire::test(CreateImage::class)
        ->fillForm(['order_column' => null, 'published' => true])
        ->call('create')
        ->assertHasFormErrors(['order_column' => 'required']);
});

it('validates price must be numeric', function () {
    Livewire::test(CreateImage::class)
        ->fillForm(['price' => 'abc', 'order_column' => 1, 'published' => true])
        ->call('create')
        ->assertHasFormErrors(['price']);
});
