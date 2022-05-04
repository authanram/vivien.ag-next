<?php

use App\View\Components;

return [

    'components' => [
        'content' => Components\Content::class,
        'icon' => Components\Icon::class,
        'markdown' => Components\Markdown::class,
        // Menus
        'footer:menu-item' => Components\Menu\MenuItemFooter::class,
        'main:menu-item' => Components\Menu\MenuItemMain::class,
        'menu' => Components\Menu\Menu::class,
    ],

    'paths' => [
        'icons' => '/vendor/icons',
    ],

    'content' => [
        'replace' => static fn () => [
            '%accent%' => util()->accent(),
            '%avatar%' => asset('images/sybille-seuffer.jpg'),
            '%year%' => now()->year,
            '%year-last%' => now()->subYear()->year,
        ],
    ],

    'markdown' => [
        'replace' => static fn () => [
            '<strong>' => '<span class="font-medium">',
            '</strong>' => '</span>',
            '<a ' => '<a class="hover:underline text-accent-600" ',
            '<h1>' => '<h1 class="text-accent-600">',
            '<h2>' => '<h2 class="text-accent-600">',
            '<h3>' => '<h3 class="text-accent-600">',
            '<h4>' => '<h4 class="text-accent-600">',
            '<h5>' => '<h5 class="text-accent-600">',
            '<h6>' => '<h6 class="text-accent-600">',
            'class="headline' => 'class="headline text-accent-600',
            '{highlight}' => '<span class="font-medium text-accent-600">',
            '{/highlight}' => '</span>',
            '-accent-' => '-{{accent}}-',
            '{{accent}}' => util()->accent(),
        ],
    ],

];
