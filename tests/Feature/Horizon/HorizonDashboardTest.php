<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate;

it('forbids guests from viewing the horizon dashboard', function () {
    $this->get('/horizon')->assertForbidden();
});

it('forbids other users from viewing the horizon dashboard', function () {
    expect(Gate::forUser(login())->allows('viewHorizon'))->toBeFalse();
});

it('allows authanram to view the horizon dashboard', function () {
    $user = User::factory()->create(['email' => 'authanram@gmail.com']);

    expect(Gate::forUser($user)->allows('viewHorizon'))->toBeTrue();
});
