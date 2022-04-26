<?php

namespace App\Services\Concerns;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

trait HasColors
{
    protected ?Collection $colors = null;

    public function getColors(array $with = []): Collection
    {
        if (!$this->colors) {
            $this->colors = Color::with($with)->get(['id', 'color']);
        }

        return $this->colors;
    }
}
