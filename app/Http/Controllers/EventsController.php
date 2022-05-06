<?php

namespace App\Http\Controllers;

use App\Facades\Site;
use App\FilterUrl;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class EventsController extends Controller
{
    public function index(Request $request, int $routeId): View
    {
        $eventRepository = Site::repositories()->events();

        $filters = $eventRepository->getBuilder()->getModel()::filters();

        return view('events.index', [
            'filterUrl' => new FilterUrl($request, $filters),
            'events' => Site::repositories()->events()->upcoming()->queryBuilder($filters),
            'eventTemplates' => $eventRepository->upcomingEventTemplates()->unique(),
            'tags' => $eventRepository->upcomingTags()->unique(),
        ]);
    }
}
