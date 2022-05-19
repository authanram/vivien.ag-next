<?php

namespace App\Providers;

use App\Contracts\Repositories\StaticAttributeRepositoryContract;
use App\RepositoriesNew\StaticAttributeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StaticAttributeRepositoryContract::class, StaticAttributeRepository::class);
    }
}
