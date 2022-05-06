<?php

namespace App\Repositories;

use App\Models\StaticAttribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class StaticAttributes extends Repository
{
    protected static Model|string $model = StaticAttribute::class;

    public static function findBySlug(string $slug): Builder|StaticAttribute|null
    {
        return self::builder()->firstWhere('slug', $slug);
    }
}
