<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface EventServiceContract
{
    public function get(array $columns = ['*']): Collection;

    public function with(array $with): self;

    public function dateRange(string $from, string $to): self;

    public function tags(array $tags = null): self;

    public function upcoming(): self;
}
