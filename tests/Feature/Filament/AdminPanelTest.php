<?php

it('can render the admin login page', function () {
    $this->get('/admin/login')->assertSuccessful();
});

it('redirects unauthenticated users to login', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

it('can render the admin dashboard', function () {
    login();

    $this->get('/admin')->assertSuccessful();
});

it('lists the cookie navigation group last', function () {
    login();

    $this->get('/admin')->assertSuccessful()->assertSeeInOrder([
        __('Events'),
        __('Media'),
        __('Content'),
        __('Quotes'),
        __('Cookies'),
    ]);
});
