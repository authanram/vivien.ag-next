<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    final public function tools(): array
    {
        $isLocal = $this->app->environment('local');

        return \collect()
            ->pipe(static function (Collection $collection) use ($isLocal) {
                if (\request()->user()->isAdministrator() === false) {
                    return $collection;
                }

                $collection
                    ->add(static::makePermissionTool())
                    ->add(new \KABBOUCHI\LogsTool\LogsTool())
                    ->add(new \Sbine\RouteViewer\RouteViewer)
                    ->add(new \Spatie\BackupTool\BackupTool());

                if ($isLocal === false) {
                    return $collection;
                }

                $collection->add(new \Spatie\TailTool\TailTool());

                if (\config('env.GENERATOR_ENABLED')) {
                    $collection->add(new \Cloudstudio\ResourceGenerator\ResourceGenerator());
                }

                return $collection;
            })
            ->toArray();
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
        return \collect([
            new \App\Nova\Cards\PageViewsMetric,
            new \App\Nova\Cards\VisitorsMetric,
            new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,
        ])->pipe(static function (Collection $collection) {
            return \request()->user()->isAdministrator()
                ? $collection
                    ->prepend(new \GijsG\SystemResources\SystemResources('ram'))
                    ->prepend(new \GijsG\SystemResources\SystemResources('cpu'))
                : $collection;
        })->toArray();
    }

    /** @noinspection SenselessMethodDuplicationInspection */
    final protected function dashboards(): array
    {
        return [];
    }

    private static function makePermissionTool(): \Vyuldashev\NovaPermission\NovaPermissionTool
    {
        return \Vyuldashev\NovaPermission\NovaPermissionTool::make()
            ->rolePolicy(RolePolicy::class)
            ->permissionPolicy(PermissionPolicy::class);
    }
}
