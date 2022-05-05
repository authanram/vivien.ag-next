<?php

namespace App\Providers;

use App\View\Components;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::component('content', Components\Content::class);
        Blade::component('icon', Components\Icon::class);
        Blade::component('markdown', Components\Markdown::class);

        // Menus
        Blade::component('footer:menu-item', Components\Menu\MenuItemFooter::class);
        Blade::component('main:menu-item', Components\Menu\MenuItemMain::class);
        Blade::component('menu', Components\Menu\Menu::class);
    }
}
