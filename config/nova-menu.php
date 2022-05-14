<?php

use App\Nova as Resources;
use App\Nova\Dashboards;
use App\Nova\User;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Vyuldashev\NovaPermission;

return [
    'main' => static fn (Request $request) => [
        MenuSection::dashboard(Dashboards\Main::class)
            ->icon('chart-bar'),

        MenuSection::make(__('Seminars'), [
            MenuItem::resource(Resources\Event::class),
            MenuItem::resource(Resources\EventTemplate::class),
            MenuItem::resource(Resources\EventRegistration::class),
        ])->collapsable()->icon('calendar'),

        MenuSection::make(__('Contents'), [
            MenuItem::resource(Resources\Image::class),
            MenuItem::resource(Resources\Post::class),
            MenuItem::resource(Resources\Quote::class),
        ])->collapsable()->icon('document-text'),

        MenuSection::make(__('Resources'), [
            MenuItem::resource(Resources\Author::class),
            MenuItem::resource(Resources\Staff::class),
            MenuItem::resource(Resources\Catering::class),
            MenuItem::resource(Resources\Location::class),
            MenuItem::resource(Resources\Tag::class),
        ])->collapsable()->icon('database'),

        MenuSection::make(__('Page'), [
            MenuItem::resource(Resources\Controller::class),
            MenuItem::resource(Resources\Layout::class),
            MenuItem::resource(Resources\MenuItem::class),
            MenuItem::resource(Resources\Menu::class),
            MenuItem::resource(Resources\Page::class),
            MenuItem::resource(Resources\Route::class),
            MenuItem::resource(Resources\StaticBlock::class),
        ])->collapsable()->icon('globe-alt'),

        MenuSection::make(__('Access Control'), [
            MenuItem::resource(Resources\User::class),
            MenuItem::resource(Resources\Session::class),
            MenuItem::resource(NovaPermission\Permission::class),
            MenuItem::resource(NovaPermission\Role::class),
        ])->collapsable()->icon('users'),

        MenuSection::make(__('Cookie Consent'), [
            MenuItem::resource(Resources\CookieConsentProvider::class),
            MenuItem::resource(Resources\CookieConsentCookie::class),
            MenuItem::resource(Resources\CookieConsentSettings::class),
        ])->collapsable()->icon('badge-check'),

        MenuSection::make(__('Misc'), [
            MenuItem::resource(Resources\StaticAttribute::class),
            MenuItem::resource(Resources\ImageCoords::class),
            MenuItem::resource(Resources\Color::class),
            MenuItem::make(__('Logs'), 'logs'),
        ])->collapsable()->icon('collection'),


    ],

    'user' => static function (Request $request, Menu $menu) {
        return $menu->prepend(
            MenuItem::make(
                __('Account'),
                sprintf('/resources/%s/%s', User::uriKey(), $request->user()->getKey()),
            ),
        );
    },

];
