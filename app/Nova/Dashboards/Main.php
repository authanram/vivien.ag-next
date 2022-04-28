<?php

namespace App\Nova\Dashboards;

//use Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard;
use App\Nova\Cards\PageViewsMetric;
use App\Nova\Cards\VisitorsMetric;
use App\Nova\Metrics\SystemResourcesCpu;
use App\Nova\Metrics\SystemResourcesRam;
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
            (new SystemResourcesRam())->width('1/2'),
            (new SystemResourcesCpu())->width('1/2'),
            new PageViewsMetric(),
            new VisitorsMetric(),
            //new MostVisitedPagesCard(),
        ];
    }
}
