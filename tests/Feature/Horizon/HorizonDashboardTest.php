<?php

use Illuminate\Support\Facades\Gate;

it('forbids guests from viewing the horizon dashboard', function () {
    $this->get('/horizon')->assertForbidden();
});

it('allows admin panel users to view the horizon dashboard', function () {
    expect(Gate::forUser(login())->allows('viewHorizon'))->toBeTrue();
});
