<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;

trait ApplyOrderings
{
    protected static function applyOrderings($query, array $orderings): Builder
    {
        if (empty($orderings) && property_exists(static::class, 'orderBy')) {
            $orderings = static::$orderBy;
        }

        return parent::applyOrderings($query, $orderings);
    }
}
