<?php

namespace App\Providers;

use App\Contracts\DataServiceContract;
use App\Contracts\EventServiceContract;
use App\Contracts\SiteServiceContract;
use App\Services\DataService;
use App\Services\EventService;
use App\Services\ParsedownService;
use App\Services\SiteService;
use App\Util;
use App\View\Components\IconRenderer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerServiceProviders();

        $this->app->bind(SiteServiceContract::class, SiteService::class);

        $this->app->bind(EventServiceContract::class, EventService::class);
        $this->app->bind(ParsedownService::class, ParsedownService::class);
        $this->app->singleton(DataServiceContract::class, DataService::class);
        $this->app->singleton(Util::class, Util::class);
    }

    public function boot(): void
    {
        date_default_timezone_set('Europe/Berlin');
        setlocale(LC_TIME, 'de_DE');
        Carbon::setLocale(config('app.locale'));

        Blade::component('icon-renderer', IconRenderer::class);
    }

    private function registerServiceProviders(): void
    {
        if ($this->app->environment('local') === false) {
            return;
        }

        if (class_exists('\Laracasts\Generators\GeneratorsServiceProvider')) {
            $this->app->register('\Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
