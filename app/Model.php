<?php

namespace App;

use Illuminate\Support\Str;

/**
 * App\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model query()
 * @mixin \Eloquent
 * @property-read string $entity_type
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    public static function getTagClassName(): string
    {
        return static::class;
    }

    final public function getEntityTypeAttribute(): string
    {
        return Str::studly($this->table);
    }
}
