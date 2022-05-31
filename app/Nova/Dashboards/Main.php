<?php

namespace App\Nova\Dashboards;

//use App\Nova\Metrics\TrendSystemResourcesCpu;
use App\Nova\Metrics\AnalyticsPageViews;
use App\Nova\Metrics\AnalyticsVisitors;
use App\Nova\Metrics\ProgressSystemResourcesCpu;
use App\Nova\Metrics\ProgressSystemResourcesRam;
use App\Nova\Metrics\ValueActiveSessions;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    public function name(): string
    {
        return 'Dashboard';
    }

    public function cards(): array
    {
        return [
            //(new TrendSystemResourcesCpu())->width('1/2'),
            (new ProgressSystemResourcesCpu())->width('1/2'),
            (new ProgressSystemResourcesRam())->width('1/2'),
            new ValueActiveSessions(),
            new AnalyticsVisitors(),
            new AnalyticsPageViews(),
        ];
    }
}
