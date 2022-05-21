<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/home';

    public function map(): void
    {
        $this->configureRateLimiting();

        $this->mapPublicApiRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapActions();
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

    final protected function mapActions(): void
    {
        Route::middleware('web')
            ->group(base_path('routes/actions.php'));
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

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', static function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
