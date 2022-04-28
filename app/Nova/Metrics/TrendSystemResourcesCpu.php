<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;

class TrendSystemResourcesCpu extends Trend
{
    public $name = 'CPU';

    public function calculate(): TrendResult
    {
        return (new TrendResult)->trend([
            now()->format('H:i:s') => 4,
            now()->addSeconds(5)->format('H:i:s') => 17,
            now()->addSeconds(10)->format('H:i:s') => 90,
            now()->addSeconds(15)->format('H:i:s') => 77,
            now()->addSeconds(20)->format('H:i:s') => 33,
        ])->suffix('%')->showLatestValue();
    }

    public function ranges(): array
    {
        return [];
    }
}
