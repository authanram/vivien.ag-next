<?php

namespace App\View\Components;

use App\Models\Model;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component as BaseComponent;
use InvalidArgumentException;

abstract class Component extends BaseComponent
{
    protected static string $alias = '';

    public Collection $extraAttributes;

    public function __construct(public ?Model $model = null)
    {
        $this->extraAttributes = collect($this->getExtraAttributes());
    }

    public function render(): View
    {
        if (static::$alias === '') {
            throw new InvalidArgumentException(static::class.'::$view must not be empty.');
        }

        return view(static::$alias);
    }

    protected function getExtraAttributes(): array
    {
        return [];
    }
}
