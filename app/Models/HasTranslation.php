<?php

namespace App\Models;

use Illuminate\Support\Facades\App;

trait HasTranslation
{
    public function getLocale(): string
    {
        return App::currentLocale();
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
