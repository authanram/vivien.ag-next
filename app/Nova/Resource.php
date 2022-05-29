<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Resource as NovaResource;

abstract class Resource extends NovaResource
{
    use RedirectsAfterPersist;

    protected static array $orderBy = ['id' => 'asc'];

    public static function authorizable(): bool
    {
        return false;
    }

    public static function group(): string
    {
        return static::$group !== 'Other' ? static::$group : __('Contents');
    }

    protected static function applyOrderings($query, array $orderings): Builder
    {
        if (empty($orderings) && property_exists(static::class, 'orderBy')) {
            $orderings = static::$orderBy;
        }

        return parent::applyOrderings($query, $orderings);
    }
}
