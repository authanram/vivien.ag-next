<?php

namespace App\Providers;

use App\View\Components;
use Illuminate\Support\Facades\Blade;

class ViewServiceProvider extends \Illuminate\View\ViewServiceProvider
{
    final public function boot(): void
    {
        Blade::component('card', Components\Card::class);

        Blade::component('container', Components\Container::class);
    }
}
