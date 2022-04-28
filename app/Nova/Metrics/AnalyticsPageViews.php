<?php

namespace App\Nova\Metrics;

use Tightenco\NovaGoogleAnalytics\PageViewsMetric;

class AnalyticsPageViews extends PageViewsMetric
{
    public $icon = 'eye';

    public function ranges(): array
    {
        return [
            0 => 'Today',
            'MTD' => 'Month',
            'YTD' => 'Year',
            // 'MTD' => 'Month To Date',
            // 'QTD' => 'Quarter To Date',
            // 'YTD' => 'Year To Date',
            // 60 => '60 Days',
        ];
    }
}
