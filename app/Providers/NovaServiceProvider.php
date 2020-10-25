<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    final public function tools(): array
    {
        $tools = [
            static::makePermissionTool(),
            new \KABBOUCHI\LogsTool\LogsTool(),
            new \Sbine\RouteViewer\RouteViewer,
            new \Spatie\BackupTool\BackupTool(),
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

    final public function register(): void
    {
        //
    }

    final protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    final protected function gate(): void
    {
        Gate::define('viewNova', static function ($user) {
            return \in_array($user->email, config('nova-settings.gates', []), true);
        });
    }

    final protected function cards(): array
    {
        return [
            new \GijsG\SystemResources\SystemResources('ram'),
            new \GijsG\SystemResources\SystemResources('cpu'),
            new \App\Nova\Cards\PageViewsMetric,
            new \App\Nova\Cards\VisitorsMetric,
            new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,
        ];
    }

//    final protected function dashboards(): array
//    {
//        return [];
//    }

    private static function makePermissionTool(): \Vyuldashev\NovaPermission\NovaPermissionTool
    {
        return \Vyuldashev\NovaPermission\NovaPermissionTool::make()
            ->rolePolicy(RolePolicy::class)
            ->permissionPolicy(PermissionPolicy::class);
    }
}
