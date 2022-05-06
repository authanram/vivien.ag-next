<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

abstract class Controller extends BaseController
{
    protected const VIEW = 'welcome';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request, int $routeId): View
    {
        return view(static::VIEW, $this->data($routeId));
    }

    protected function data(?int $routeId): array
    {
        $route = $this->route($routeId);

        return [
            'views' => $route->getAttribute('contentViews'),
            'title' => $route->getAttribute('title'),
        ];
    }

    protected function route(?int $routeId): Builder|Route
    {
        return Route::with('contentViews')
            ->where('id', $routeId)
            ->firstOrFail();
    }
}
