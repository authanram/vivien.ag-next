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
     * @noinspection PhpMultipleClassDeclarationsInspection
     */
    public function __call($method, $parameters)
    {
        if (method_exists(static::$presenter, $method)) {
            return $this->present()->{$method}($parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * @throws PresenterException
     * @noinspection MagicMethodsValidityInspection
     * @noinspection PhpMultipleClassDeclarationsInspection
     */
    public function __get($key)
    {
        if (property_exists(static::$presenter, $key)) {
            return $this->present()->{$key};
        }

        return parent::__get($key);
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
