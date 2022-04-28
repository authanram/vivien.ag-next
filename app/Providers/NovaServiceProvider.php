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
use Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard;

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

    final protected function cards(): array
    {
        return collect([
            new PageViewsMetric,
            new VisitorsMetric,
            new MostVisitedPagesCard,
        ])->pipe(static function (Collection $collection) {
            return $collection;
//            return request()->user()->isAdministrator()
//                ? $collection
//                    ->prepend(new SystemResources('ram'))
//                    ->prepend(new SystemResources('cpu'))
//                : $collection;
        })->toArray();
    }

    protected function dashboards(): array
    {
        return [
            new Main(),
        ];
    }
}
