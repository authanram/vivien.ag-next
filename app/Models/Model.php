<?php

namespace App\Models;

use Illuminate\Support\Str;

abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (isset($this->attributes) === false) {
            parent::__construct();
        }

        if (in_array('uuid', $this->fillable) === false) {
            return;
        }

        $this->attributes['uuid'] ??= Str::orderedUuid()->toString();
    }

    public static function getTagClassName(): string
    {
        return static::class;
    }

    public function getEntityTypeAttribute(): string
    {
        return Str::studly($this->table);
    }

    public function dateFormat(string $attribute): string
    {
        return ($this->{$attribute} ?? now())->format(config('app.date_format'));
    }
}
