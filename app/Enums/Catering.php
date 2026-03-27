<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;

enum Catering: string
{
    use HasEnumOptions;

    case IncludingFood = 'including_food';
    case IncludingDrinks = 'including_drinks';
    case RobysCatering = 'robys_catering';
    case DiningOut = 'dining_out';

    public function label(): string
    {
        return match ($this) {
            self::IncludingFood => __('Including Food'),
            self::IncludingDrinks => __('Including Drinks'),
            self::RobysCatering => __("Roby's Catering"),
            self::DiningOut => __('Dining Out'),
        };
    }
}
