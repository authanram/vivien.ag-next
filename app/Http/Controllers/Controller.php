<?php

namespace App\Http\Controllers;

use App\Route;
use App\Services\StateService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(StateService $stateService)
    {
        $stateService->merge(data()->getMenus());

        $stateService->merge(data()->getImageCoords());
    }

    final public function defaultData(int $routeId): array
    {
        $route = static::findRoute($routeId);

        return [

            'contents' => $route->getAttribute('contents'),

            'title' => $route->getAttribute('title'),

        ];
    }

    final public static function findRoute(int $routeId)
    {
        return Route::with('contents')

            ->where('id', $routeId)

            ->firstOrFail();
    }
}
