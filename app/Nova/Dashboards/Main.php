<?php

namespace App\Nova\Dashboards;

use App\Nova\Cards\PageViewsMetric;
use App\Nova\Cards\VisitorsMetric;
use GijsG\SystemResources\SystemResources;
use Illuminate\Support\Collection;
use Laravel\Nova\Dashboards\Main as Dashboard;
use Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard;

class Main extends Dashboard
{
    public function name(): string
    {
        return 'Dashboard';
    }

    public function cards(): array
    {
        return collect([
            new PageViewsMetric,
            new VisitorsMetric,
            new MostVisitedPagesCard,
        ])->pipe(static function (Collection $collection) {
            return app()->environment('local') === false && request()->user()->isAdministrator()
                ? $collection
                    ->prepend(new SystemResources('ram'))
                    ->prepend(new SystemResources('cpu'))
                : $collection;
        })->toArray();
    }
}
