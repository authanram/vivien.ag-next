<?php

namespace App\Presenters;

use App\Models\Model;

/**
 * @property Model $entity
 */
abstract class Presenter
{
    public function __construct(protected Model $entity)
    {
    }

    /** @noinspection MagicMethodsValidityInspection */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

    protected function get(string $key): mixed
    {
        return data_get($this->entity, $key);
    }

    protected function dateFormat(string $attribute): ?string
    {
        return $this->entity->{$attribute}?->format(config('app.date_format'));
    }
}
