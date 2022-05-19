<?php

namespace App\Models;

use App\Exceptions\PresenterException;
use App\PresentersNew\BasePresenter;

/**
 * @property BasePresenter $presenter
 */
trait PresentableTrait
{
    use \Prettus\Repository\Traits\PresentableTrait;

    /**
     * @throws PresenterException
     */
    public function __call($method, $parameters)
    {
        if ($this->hasPresenter() && method_exists($this->presenter, $method)) {
            return $this->setEntityResolver()->{$method}(...$parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * @noinspection MagicMethodsValidityInspection
     */
    public function __get($key)
    {
        if ($this->hasPresenter()) {
            if (method_exists($this->presenter, $key)) {
                return $this->setEntityResolver()->{$key}();
            }

            if (property_exists($this->presenter, $key)) {
                return $this->setEntityResolver()->{$key};
            }
        }

        return parent::__get($key);
    }

    private function setEntityResolver(): BasePresenter
    {
        return $this->presenter->setEntityResolver(fn () => $this);
    }
}
