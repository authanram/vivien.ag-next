<?php

use App\Nova as Resources;
use App\Nova\Dashboards;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;

return [

    'main' => static fn (Request $request) => [
        MenuSection::dashboard(Dashboards\Main::class)
            ->icon('chart-bar'),

        MenuSection::make(__('Events'), [
            MenuItem::resource(Resources\EventRegistration::class),
            MenuItem::resource(Resources\Event::class),
            MenuItem::resource(Resources\EventTemplate::class),
        ])->collapsable()->icon('calendar'),

        MenuSection::make(__('Resources'), [
            MenuItem::resource(Resources\StaticAttribute::class),
            MenuItem::resource(Resources\Catering::class),
            MenuItem::resource(Resources\Content::class),
            MenuItem::resource(Resources\Image::class),
            MenuItem::resource(Resources\Post::class),
            MenuItem::resource(Resources\Tag::class),
            MenuItem::resource(Resources\StaffProfile::class),
            MenuItem::resource(Resources\Location::class),
        ])->collapsable()->icon('document-text'),

        MenuSection::make(__('Quotes'), [
            MenuItem::resource(Resources\Author::class),
            MenuItem::resource(Resources\Quote::class),
        ])->collapsable()->icon('chat-alt'),

        MenuSection::make(__('Access Control'), [
            MenuItem::resource(Resources\User::class),
            MenuItem::resource(Resources\Session::class),
        ])->collapsable()->icon('shield-exclamation'),

        MenuSection::make(__('Cookie Consent'), [
            MenuItem::resource(Resources\CookieConsentProvider::class),
            MenuItem::resource(Resources\CookieConsentCookie::class),
            MenuItem::resource(Resources\CookieConsentSettings::class),
        ])->collapsable()->icon('badge-check'),

        MenuSection::make(__('Routing'), [
            MenuItem::resource(Resources\MenuItem::class),
            MenuItem::resource(Resources\Menu::class),
            MenuItem::resource(Resources\Route::class),
        ])->collapsable()->icon('switch-horizontal'),

        MenuSection::make(__('Misc'), [
            MenuItem::resource(Resources\Attachment::class),
            MenuItem::resource(Resources\ImageCoords::class),
            MenuItem::resource(Resources\Color::class),
            #ItemFooter::externalLink('External Link', '#'),
        ])->collapsable()->icon('collection'),
    ],

    'user' => static function (Request $request, Menu $menu) {
        return $menu->prepend(
            MenuItem::make(
                __('Account'),
                sprintf('/resources/users/%s', $request->user()->getKey()),
            )
        );
    },

];
