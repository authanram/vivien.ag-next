<?php

namespace App\Nova\Cards;

class PageViewsMetric extends \Tightenco\NovaGoogleAnalytics\PageViewsMetric
{
    public function ranges()
    {
        return [
            'MTD' => 'This month (to date)',
            1 => 'Today',
            // 60 => '60 Days',
            'YTD' => 'This year (to date)',
            // 'MTD' => 'Month To Date',
            // 'QTD' => 'Quarter To Date',
            // 'YTD' => 'Year To Date',
        ];
    }
}
