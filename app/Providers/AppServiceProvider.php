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

        $this->app->bind(Contracts\ContentRendererContract::class, Renderers\ContentRenderer::class);
        $this->app->bind(Contracts\IconRendererContract::class, Renderers\IconRenderer::class);
        $this->app->bind(Contracts\MarkdownParserContract::class, Renderers\MarkdownParser::class);
        $this->app->bind(Contracts\SiteServiceContract::class, Services\SiteService::class);

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
        if ($this->app->environment('local') === false) {
            return;
        }

        if (class_exists('\Laracasts\Generators\GeneratorsServiceProvider')) {
            $this->app->register('\Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
