<?php

namespace App\Nova\Dashboards;

use App\Nova\Cards\PageViewsMetric;
use App\Nova\Cards\VisitorsMetric;
use GijsG\SystemResources\SystemResources;
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
        return [
            new PageViewsMetric(),
            new VisitorsMetric(),
            new MostVisitedPagesCard(),
            new SystemResources('ram'),
            new SystemResources('cpu'),
        ];
    }
}
