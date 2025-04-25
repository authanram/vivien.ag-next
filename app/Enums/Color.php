<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;

enum Color: string
{
    use HasEnumOptions;

    case Blue = 'blue';

    public function label(): string
    {
        return match ($this) {
            self::Blue => __('Blue'),
        };
    }
}
