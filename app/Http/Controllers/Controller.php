<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

abstract class Controller extends BaseController
{
    protected const VIEW = 'welcome';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(int $routeId): View
    {
        return view(static::VIEW, $this->data($routeId));
    }

    protected function data(?int $routeId): array
    {
        $route = $routeId
            ? Cache::get(self::cacheKey($routeId), static fn () => static::cacheRoute($routeId))
            : null;

        return [
            'contents' => $route?->getAttribute('contents'),
            'title' => $route?->getAttribute('title'),
        ];
    }

    protected static function cacheRoute(int $routeId)
    {
        $route = Route::with('contents')
            ->where('id', $routeId)
            ->firstOrFail();

        /** @noinspection PhpUnhandledExceptionInspection */
        Cache::set(self::cacheKey($routeId), $route);

        return $route;
    }

    private static function cacheKey(string $suffix): string
    {
        return Route::class.'@'.__CLASS__.":$suffix";
    }
}
