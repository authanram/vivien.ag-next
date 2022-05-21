<?php

namespace App\Providers;

use App\Contracts\Repositories as Contracts;
use App\RepositoriesNew as Repositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Contracts\RouteRepositoryContract::class, Repositories\RouteRepository::class);
    }
}
