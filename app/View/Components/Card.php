<?php

namespace App\View\Components;

use Illuminate\View\View;

class Card extends Component
{
    public bool $even;

    public bool $pattern;

    public function __construct(bool $even = false, bool $pattern = false)
    {
        $this->even = $even;

        $this->pattern = $pattern;
    }

    final public function render(): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('components.card');
    }
}
