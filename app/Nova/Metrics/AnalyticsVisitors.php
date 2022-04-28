<?php

namespace App\Nova\Metrics;

use Tightenco\NovaGoogleAnalytics\VisitorsMetric;

class AnalyticsVisitors extends VisitorsMetric
{
    public $icon = 'globe';

    public function ranges(): array
    {
        return [
            0 => 'Today',
            'MTD' => 'Month',
            'YTD' => 'Year',
            // 30 => '30 Days',
            // 60 => '60 Days',
            // 365 => '365 Days',
            // 'QTD' => 'Quarter To Date',
        ];
    }
}
