<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component as BaseComponent;
use InvalidArgumentException;

abstract class Component extends BaseComponent
{
    protected static string $alias = '';

    protected Collection $extraAttributes;

    public function extraAttributes(): Collection
    {
        $this->extraAttributes ??= collect(
            method_exists($this, 'getExtraAttributes')
                ? $this->getExtraAttributes()
                : [],
        );

        return $this->extraAttributes;
    }

    public function render(): View
    {
        if (static::$alias === '') {
            throw new InvalidArgumentException(static::class.'::$view must not be empty.');
        }

        $this->extraAttributes = collect(

        );

        return view(static::$alias);
    }
}
