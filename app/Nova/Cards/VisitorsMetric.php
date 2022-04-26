<?php

namespace App\Nova\Cards;

class VisitorsMetric extends \Tightenco\NovaGoogleAnalytics\VisitorsMetric
{
    public function ranges(): array
    {
        return [
            'MTD' => 'This month (to date)',
            1 => 'Today',
            // 30 => '30 Days',
            // 60 => '60 Days',
            // 365 => '365 Days',
            // 'QTD' => 'Quarter To Date',
            'YTD' => 'This year (to date)',
        ];
    }
}
