<?php

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Models\Post;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Livewire\Livewire;

beforeEach(function () {
    login();
});

it('can render the list page', function () {
    Livewire::test(ListPosts::class)->assertSuccessful();
});

it('can render the create page', function () {
    Livewire::test(CreatePost::class)->assertSuccessful();
});

it('can render the edit page', function () {
    $post = Post::factory()->create();

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->assertSuccessful();
});

it('can list posts', function () {
    $posts = Post::factory()->count(3)->create();

    Livewire::test(ListPosts::class)
        ->assertCanSeeTableRecords($posts);
});

it('can create a post', function () {
    $newData = [
        'title' => 'Test Post Title',
        'slug' => 'test-post-title',
        'body' => 'This is a test post body.',
    ];

    Livewire::test(CreatePost::class)
        ->fillForm($newData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Post::class, $newData);
});

it('can retrieve a post for editing', function () {
    $post = Post::factory()->create();

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->assertSchemaStateSet([
            'title' => $post->title,
            'slug' => $post->slug,
            'body' => $post->body,
        ]);
});

it('can update a post', function () {
    $post = Post::factory()->create();

    $newData = [
        'title' => 'Updated Title',
        'slug' => 'updated-title',
        'body' => 'Updated body content.',
    ];

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->fillForm($newData)
        ->call('save')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Post::class, $newData);
});

it('can delete a post', function () {
    $post = Post::factory()->create();

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->callAction(DeleteAction::class);

    expect($post->fresh()->deleted_at)->not->toBeNull();
});

it('can force delete a post', function () {
    $post = Post::factory()->create();
    $post->delete();

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->callAction(ForceDeleteAction::class);

    expect(Post::withTrashed()->find($post->id))->toBeNull();
});

it('can restore a post', function () {
    $post = Post::factory()->create();
    $post->delete();

    Livewire::test(EditPost::class, ['record' => $post->uuid])
        ->callAction(RestoreAction::class);

    expect($post->fresh()->deleted_at)->toBeNull();
});

it('validates title is required', function () {
    Livewire::test(CreatePost::class)
        ->fillForm(['title' => '', 'slug' => 'test', 'body' => 'test'])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

it('validates slug is required', function () {
    Livewire::test(CreatePost::class)
        ->fillForm(['title' => 'test', 'slug' => '', 'body' => 'test'])
        ->call('create')
        ->assertHasFormErrors(['slug' => 'required']);
});

it('validates body is required', function () {
    Livewire::test(CreatePost::class)
        ->fillForm(['title' => 'test', 'slug' => 'test', 'body' => ''])
        ->call('create')
        ->assertHasFormErrors(['body' => 'required']);
});
