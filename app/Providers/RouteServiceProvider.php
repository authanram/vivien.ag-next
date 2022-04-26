<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/home';

    public function map(): void
    {
        $this->mapPublicApiRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapWebRoutesLocal();
    }

    final protected function mapPublicApiRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/public-api.php'));
    }

    final protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    final protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    final protected function mapWebRoutesLocal(): void
    {
        if ($this->app->environment('local') === false) {
            return;
        }

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/local.php'));
    }
}
