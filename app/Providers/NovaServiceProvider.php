<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function tools(): array
    {
        $tools = [
            new \Spatie\BackupTool\BackupTool(),
            new \Sbine\RouteViewer\RouteViewer,
            new \KABBOUCHI\LogsTool\LogsTool(),
        ];

        if ($this->app->environment('local')) {
            $tools = array_merge($tools, [
                new \Spatie\TailTool\TailTool(),
            ]);

            if (config('env.GENERATOR_ENABLED')) {
                $tools[] = new \Cloudstudio\ResourceGenerator\ResourceGenerator();
            }
        }

        return $tools;
    }

    public function register(): void
    {
        //
    }

    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    protected function gate(): void
    {
        Gate::define('viewNova', static function ($user) {
            return \in_array($user->email, config('nova-settings.gates', []), true);
        });
    }

    protected function resources(): void
    {
        Nova::resourcesIn(app_path('Nova'));
    }

    protected function cards(): array
    {
        return [
            new \GijsG\SystemResources\SystemResources('ram'),
            new \GijsG\SystemResources\SystemResources('cpu'),
            new \App\Nova\Cards\PageViewsMetric,
            new \App\Nova\Cards\VisitorsMetric,
            new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,
        ];
    }

    protected function dashboards(): array
    {
        return [];
    }
}
