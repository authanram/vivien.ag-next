<?php

namespace App\Models;

trait HasTranslation
{
    public function getLocale(): string
    {
        return app()->getLocale();
    }

    public function getTranslation(string $attribute): mixed
    {
        return $this[$attribute][$this->getLocale()];
    }

    public function setTranslation(string $attribute, mixed $value = null): static
    {
        $this[$attribute][$this->getLocale()] = $value;

        return $this;
    }
}
