<?php

namespace App\Providers;

use App\Contracts\DataServiceContract;
use App\Contracts\EventServiceContract;
use App\Services\DataService;
use App\Services\EventService;
use App\Services\ParsedownService;
use App\View\Components\IconRenderer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Systems\Seed\Providers\ServiceProvider as SeedServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    final public function boot(): void
    {
        date_default_timezone_set('Europe/Berlin');

        setlocale(LC_TIME, 'de_DE');

        Carbon::setLocale(config('app.locale'));

        Blade::component('icon-renderer', IconRenderer::class);
    }

    final public function register(): void
    {
        $this->registerSingletons();
        $this->registerServiceProviders();
        $this->registerServices();
    }

    private function registerSingletons(): void
    {
        $this->app->singleton(DataServiceContract::class, static function () {
            return new DataService;
        });
    }

    private function registerServiceProviders(): void
    {
        if ($this->app->environment('local')) {
            if (\class_exists('\Laracasts\Generators\GeneratorsServiceProvider')) {
                $this->app->register('\Laracasts\Generators\GeneratorsServiceProvider');
            }

            $this->app->register(SeedServiceProvider::class);
        }

        $this->app->bind(ParsedownService::class, static function () {
            return new ParsedownService();
        });
    }

    private function registerServices(): void
    {
        $this->app->bind(EventServiceContract::class, static function () {
            return new EventService;
        });
    }
}
