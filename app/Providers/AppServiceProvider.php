<?php

namespace App\Providers;

use App\Contracts\DataServiceContract;
use App\Contracts\EventServiceContract;
use App\Contracts\StaticAttributesServiceContract;
use App\Services\DataService;
use App\Services\EventService;
use App\Services\ParsedownService;
use App\Services\StateService;
use App\Services\StaticAttributesService;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Systems\Seed\Providers\ServiceProvider as SeedServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    final public function boot(): void
    {
        date_default_timezone_set('Europe/Berlin');
        setlocale(LC_TIME, 'de_DE');
        Carbon::setLocale(config('app.locale'));
    }

    final public function register(): void
    {
        $this->registerSingletons();
        $this->registerServiceProviders();
        $this->registerServices();
    }

    private function registerSingletons(): void
    {
        $this->app->singleton(StaticAttributesServiceContract::class, static function () {
            return new StaticAttributesService;
        });

        $this->app->singleton(DataServiceContract::class, static function () {
            return new DataService;
        });

        $this->app->singleton(StateService::class, static function () {
            return new StateService;
        });
    }

    private function registerServiceProviders(): void
    {
        if ($this->app->environment('local')) {
            if (config('env.GENERATOR_ENABLED')
                && \class_exists('\Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider')
            ) {
                $this->app->register(\Krlove\EloquentModelGenerator\Provider\GeneratorServiceProvider::class);
            }

            if (\class_exists('\Laracasts\Generators\GeneratorsServiceProvider')) {
                $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
            }

            $this->app->register(SeedServiceProvider::class);
        }

        $this->app->register(ViewServiceProvider::class);

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
