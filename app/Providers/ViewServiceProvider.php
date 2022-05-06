<?php

namespace App\Providers;

use App\View\Components;
use App\View\Composers\SiteComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootBladeComponents();
        $this->bootViewComposers();
    }

    protected function bootBladeComponents(): void
    {
        Blade::component('content', Components\Content::class);
        Blade::component('icon', Components\Icon::class);
        Blade::component('markdown', Components\Markdown::class);

        // Menus
        Blade::component('footer:menu-item', Components\Menu\MenuItemFooter::class);
        Blade::component('main:menu-item', Components\Menu\MenuItemMain::class);
        Blade::component('menu', Components\Menu\Menu::class);
    }

    protected function bootViewComposers(): void
    {
        View::composer('layouts.blank', SiteComposer::class);
    }
}
