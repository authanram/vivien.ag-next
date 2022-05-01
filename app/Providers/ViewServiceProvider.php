<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        collect(config('project.components'))
            ->each(fn (string $component, string $alias) => Blade::component($alias, $component));
    }
}
