<?php

namespace App\Models;

use App\Exceptions\PresenterException;
use App\Presenters\Presenter;
use Illuminate\Support\Str;

class Model extends \Illuminate\Database\Eloquent\Model
{
    protected ?Presenter $presenterInstance = null;

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

    public function present(): Presenter
    {
        if (is_null($this->presenterInstance) === false) {
            return $this->presenterInstance;
        }

        if (class_exists(static::$presenter) === false) {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new PresenterException(static::class.'::$presenter is undefined.');
        }

        $this->presenterInstance = new static::$presenter($this);

        return $this->presenterInstance;
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
