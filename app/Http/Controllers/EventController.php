<?php

namespace App\Http\Controllers;

use App\Facades\Site;
use App\FilterUrlGenerator;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class EventController extends Controller
{
    public function index(Request $request, Route $route): View
    {
        $eventRepository = Site::repositories()->events();

        $filters = $eventRepository->getBuilder()->getModel()::filters();

        return view('events.index', [
            'filterUrl' => new FilterUrlGenerator($request, $filters),
            'events' => Site::repositories()->events()->upcoming()->queryBuilder($filters),
            'eventTemplates' => $eventRepository->upcomingEventTemplates()->unique(),
            'tags' => $eventRepository->upcomingTags()->unique(),
        ]);
    }

    public function detail(): string
    {
        return __METHOD__;
    }
}