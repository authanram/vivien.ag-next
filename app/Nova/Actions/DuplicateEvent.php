<?php

namespace App\Nova\Actions;

class DuplicateEvent extends DuplicateResource
{
    public static function getAttributes(): array
    {
        return [
            'date_from' => now()->addYears(10),
            'date_to' => now()->addYears(10)->addHours(3),
            'reserved_seats' => 0,
            'published' => 0,
        ];
    }
}
