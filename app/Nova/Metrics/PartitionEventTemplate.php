<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Metrics\PartitionResult;

class PartitionEventTemplate extends Partition
{
    public function calculate(NovaRequest $request): PartitionResult
    {
        return $this->average($request, $request->model(), 'event_template_id', 'description');
    }

    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    public function uriKey(): string
    {
        return 'event-template-partition';
    }
}
