<?php

namespace App\Providers;

use App\Contracts\SiteService;
use App\View\Components;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootSharedData();
        $this->bootBladeComponents();
    }

    protected function bootSharedData(): void
    {
        $siteService = $this->app[SiteService::class];

        View::share('accent', $siteService->theme()->accent(request()));
        View::share('site', $siteService);
        View::share('text', $siteService->text());
        View::share('theme', $siteService->theme());
    }

    protected function bootBladeComponents(): void
    {
        Blade::component('icon', Components\Icon::class);
        Blade::component('markdown', Components\Markdown::class);

        // Menus
        Blade::component('footer:menu-item', Components\Menu\MenuItemFooter::class);
        Blade::component('main:menu-item', Components\Menu\MenuItemMain::class);
        Blade::component('menu', Components\Menu\Menu::class);
    }
}
