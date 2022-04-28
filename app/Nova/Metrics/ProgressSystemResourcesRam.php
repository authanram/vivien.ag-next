<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Metrics\Progress;
use GijsG\SystemResources\SystemResources;
use Laravel\Nova\Metrics\ProgressResult;

class ProgressSystemResourcesRam extends Progress
{
    public function name(): string
    {
        return 'Memory Usage';
    }

    public function calculate(): ProgressResult
    {
        return $this->result((new SystemResources())->ram(), 100)->avoid();
    }
}
