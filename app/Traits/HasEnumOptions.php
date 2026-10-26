<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasEnumOptions
{
    public static function toOptions(): Collection
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [$case->value => $case->label()]);
    }

    abstract public function label(): string;
}
