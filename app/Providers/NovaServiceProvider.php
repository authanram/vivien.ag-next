<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\LogViewer\LogViewer;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Vyuldashev\NovaPermission\NovaPermissionTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Nova::serving(static function () {
            Nova::translations(base_path('lang/de.json'));

            Nova::$jsonVariables['brandColorsCSS'] = \App\Nova::brandColorsCSS(
                Auth::user()?->load('settings')?->settings?->color?->rgb,
            );
        });

        Nova::style('backend', public_path('vendor/nova-custom/backend.css'));
        Nova::script('backend', public_path('vendor/nova-custom/backend.js'));

        if (config('nova-menu.main')) {
            Nova::mainMenu(config('nova-menu.main'));
        }

        if (config('nova-menu.user')) {
            Nova::userMenu(config('nova-menu.user'));
        }

        Nova::footer(static fn ($request) => null);
    }

    final protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    final protected function gate(): void
    {
        Gate::define('viewNova', static function ($user) {
            return in_array($user->email, config('nova-settings.gates', []), true);
        });
    }

    protected function dashboards(): array
    {
        return [
            new Main(),
        ];
    }

    public function tools(): array
    {
        return array_merge(parent::tools(), [
            NovaPermissionTool::make()
                ->rolePolicy(RolePolicy::class)
                ->permissionPolicy(PermissionPolicy::class),
            new LogViewer(),
        ]);
    }
}
