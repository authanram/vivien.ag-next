<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;

enum Salutation: string
{
    use HasEnumOptions;

    case Mr = 'mr';
    case Mrs = 'Mrs';

    public function label(): string
    {
        return match ($this) {
            self::Mr => __('Mr'),
            self::Mrs => __('Mrs'),
        };
    }
}
