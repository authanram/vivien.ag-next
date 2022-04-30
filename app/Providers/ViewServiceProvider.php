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
        Blade::component('menu:footer:item', Menu\ItemFooter::class);
        Blade::component('menu:main', Menu\Menu::class);
        Blade::component('menu:main:item', Menu\ItemMain::class);

        Blade::component('renderer:icon', IconRenderer::class);
    }
}
