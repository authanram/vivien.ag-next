<?php

namespace App\Services\Concerns;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

trait HasColors
{
    protected ?Collection $colors = null;

    public function colors(array $with = []): Collection
    {
        $this->colors ??= $this->util->remember(
            Color::class.'@'.__METHOD__,
            static fn () => Color::with($with)->get(['id', 'color']),
        );

        return $this->colors;
    }
}
