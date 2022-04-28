<?php

namespace App\Nova\Dashboards;

//use Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard;
use App\Nova\Cards\PageViewsMetric;
use App\Nova\Cards\VisitorsMetric;
use GijsG\SystemResources\SystemResources;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    public function name(): string
    {
        return 'Dashboard';
    }

    public function cards(): array
    {
        if (request()->user()->isAdministrator() === false) {
            return [];
        }

        return [
            new SystemResources('ram'),
            new SystemResources('cpu'),
            new PageViewsMetric(),
            new VisitorsMetric(),
        ];
    }
}
