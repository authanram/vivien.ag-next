<?php

namespace App\Providers;

use App\Contracts;
use App\Renderers;
use App\Services;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerServiceProviders();

        $this->app->bind(Contracts\IconRenderer::class, Renderers\IconRenderer::class);
        $this->app->bind(Contracts\MarkdownRenderer::class, Renderers\MarkdownRenderer::class);

        $this->app->bind(Contracts\Services\ComponentServiceContract::class, Services\ComponentService::class);
        $this->app->bind(Contracts\Services\NovaFieldServiceContract::class, Services\NovaFieldService::class);
        $this->app->bind(Contracts\Services\RoutableServiceContract::class, Services\RoutableService::class);
        $this->app->bind(Contracts\Services\RouteServiceContract::class, Services\RouteService::class);
        $this->app->bind(Contracts\SiteService::class, Services\SiteService::class);

        if ($this->app->runningInConsole()) {
            return;
        }

        $this->app->register(ViewServiceProvider::class);
    }

    public function boot(): void
    {
        date_default_timezone_set('Europe/Berlin');
        setlocale(LC_TIME, 'de_DE');
        Carbon::setLocale(config('app.locale'));
    }

    private function registerServiceProviders(): void
    {
        $this->app->register(RepositoryServiceProvider::class);

        if ($this->app->environment('local') === false) {
            return;
        }

        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
    }
}
