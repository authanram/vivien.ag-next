<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Metrics\Progress;
use GijsG\SystemResources\SystemResources;
use Laravel\Nova\Metrics\ProgressResult;

class ProgressSystemResourcesCpu extends Progress
{
    public function name(): string
    {
        return 'CPU Usage';
    }

    public function calculate(): ProgressResult
    {
        return $this->result((new SystemResources())->cpu(), 100)->avoid();
    }
}
