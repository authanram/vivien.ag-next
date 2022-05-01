<?php

namespace App\Providers;

use App\Contracts;
use App\Parsers;
use App\Renderers;
use App\Services;
use App\Util;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerServiceProviders();

        $this->app->bind(Contracts\ContentRendererContract::class, Renderers\ContentRenderer::class);
        $this->app->bind(Contracts\IconRendererContract::class, Renderers\IconRenderer::class);
        $this->app->bind(Contracts\MarkdownParserContract::class, Parsers\MarkdownParser::class);
        $this->app->bind(Contracts\SiteServiceContract::class, Services\SiteService::class);

        $this->app->bind(Contracts\EventServiceContract::class, Services\EventService::class);
        $this->app->singleton(Contracts\DataServiceContract::class, Services\DataService::class);
        $this->app->singleton(Util::class, Util::class);
    }

    public function boot(): void
    {
        date_default_timezone_set('Europe/Berlin');
        setlocale(LC_TIME, 'de_DE');
        Carbon::setLocale(config('app.locale'));
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
