<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

final class ContentViewController extends Controller
{
    public function index(int $routeId): View
    {
        $filter = static fn ($section) => static fn ($item) => $item->pivot->section === $section;

        $collection = $this->route($routeId)->contentViews;

        $title = $collection
            ->filter($filter('title'))
            ->map(fn ($item) => $item->present()->render())
            ->implode('');

        $content = $collection
            ->filter($filter('content'))
            ->map(fn ($item) => $item->present()->render())
            ->implode('');

        return view('content-view', compact('routeId', 'title', 'content'));
    }
}
