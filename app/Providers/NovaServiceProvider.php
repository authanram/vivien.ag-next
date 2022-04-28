<?php

namespace App\Providers;

use App\Nova\Cards\PageViewsMetric;
use App\Nova\Cards\VisitorsMetric;
use App\Nova\Dashboards\Main;
//use GijsG\SystemResources\SystemResources;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function tools(): array
    {
        $isLocal = $this->app->environment('local');

        return collect()
            ->pipe(static function (Collection $collection) use ($isLocal) {
//                if (request()->user()->isAdministrator() === false) {
//                    return $collection;
//                }

//                if ($isLocal === false) {
//                    return $collection;
//                }

                if (config('env.GENERATOR_ENABLED')) {
                    $collection->add(new \Cloudstudio\ResourceGenerator\ResourceGenerator());
                }

                return $collection;
            })
            ->toArray();
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
            return in_array($user->email, config('nova-settings.gates', []), true);
        });
    }

    protected function dashboards(): array
    {
        return [
            new Main(),
        ];
    }
}
