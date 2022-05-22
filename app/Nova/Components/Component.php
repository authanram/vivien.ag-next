<?php

namespace App\Nova\Components;

abstract class Component
{
    abstract public function name(): array;

    abstract public function fields(): array;

    abstract public function component(): \Illuminate\View\Component|string;
}
