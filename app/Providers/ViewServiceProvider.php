<?php

namespace App\Providers;

use App\View\Components\IconRenderer;
use App\View\Components\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::component('footer:menu-item', Menu\MenuItemFooter::class);
        Blade::component('main:menu-item', Menu\MenuItemMain::class);
        Blade::component('menu', Menu\Menu::class);

        Blade::component('renderer:icon', IconRenderer::class);
    }
}
