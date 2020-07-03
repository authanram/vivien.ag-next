<?php

namespace App\View\Components;

use Illuminate\View\View;

class Container extends Component
{
    public function __construct()
    {
        //
    }

    final public function render(): View
    {
        return view('components.container');
    }
}
