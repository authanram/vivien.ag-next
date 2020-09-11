<?php

namespace App\Nova\Actions;

use Carbon\Carbon;

class DuplicateEvent extends DuplicateResource
{
    public static function getAttributes(): array
    {
        return [
            'date_from' => Carbon::now()->addYears(10),
            'date_to' => Carbon::now()->addYears(10)->addHours(3),
            'reserved_seats' => 0,
            'published' => 0,
        ];
    }
}
