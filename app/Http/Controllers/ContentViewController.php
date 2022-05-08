<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

final class ContentViewController extends Controller
{
    public function index(Request $request, int $routeId): View
    {
        $cacheKey = "route:$routeId";

        $views = $this->route($routeId)->contentViews;

        dd($views);

        return view('content-view', compact('cacheKey', 'title', 'content'));
    }
}
