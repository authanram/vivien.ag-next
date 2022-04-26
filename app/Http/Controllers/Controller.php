<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
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
            ? static::findRoute($routeId)
            : null;

        return [
            'contents' => optional($route)->getAttribute('contents'),
            'title' => optional($route)->getAttribute('title'),
        ];
    }

    protected static function findRoute(int $routeId)
    {
        return Route::with('contents')
            ->where('id', $routeId)
            ->firstOrFail();
    }
}
