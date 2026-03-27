<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;

enum EventLocation: string
{
    use HasEnumOptions;

    case Jaegerstrasse = 'jaegerstrasse';
    case AufNebenstrecken = 'auf_nebenstrecken';
    case AtHome = 'at_home';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Jaegerstrasse => __('Jägerstraße 26, Spielberg'),
            self::AufNebenstrecken => __('Auf Nebenstrecken'),
            self::AtHome => __('At home'),
            self::Other => __('Other location'),
        };
    }
}
