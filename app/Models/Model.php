<?php

namespace App\Models;

use Illuminate\Support\Str;

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
