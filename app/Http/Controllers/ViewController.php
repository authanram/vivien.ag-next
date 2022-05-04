<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

final class ViewController extends Controller
{
    public function index(int $routeId): View
    {
        return view('view', [
            'view' => $this->route($routeId)
                ->contentViews
                ->map(fn ($contentView) => $contentView->present()->render())
                ->implode(''),
        ]);
    }
}
