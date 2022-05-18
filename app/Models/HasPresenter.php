<?php

namespace App\Models;

use App\Exceptions\PresenterException;
use App\Presenters\Presenter;

/**
 * @property Presenter|string $presenter
 */
trait HasPresenter
{
    protected ?Presenter $presenterInstance = null;

    /**
     * @throws PresenterException
     */
    public function __call($method, $parameters)
    {
        if (method_exists(static::$presenter, $method)) {
            return $this->present()->{$method}($parameters);
        }

        /** @noinspection PhpMultipleClassDeclarationsInspection */
        return parent::__call($method, $parameters);
    }

    public function present(): Presenter
    {
        if (class_exists(static::$presenter) === false) {
            /** @noinspection PhpUnhandledExceptionInspection */
            throw new PresenterException('Class not found: '.static::class);
        }

        $this->presenterInstance ??= new static::$presenter($this);

        return $this->presenterInstance;
    }
}
