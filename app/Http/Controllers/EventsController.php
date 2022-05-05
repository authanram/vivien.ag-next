<?php

namespace App\Http\Controllers;

use App\Facades\Site;
use Illuminate\View\View;

final class EventsController extends Controller
{
    public function index(int $routeId): View
    {
        $eventRepository = Site::repositories()->events();

        return view('events.index', [
            'events' => Site::repositories()->events()->upcoming()->queryBuilder(),
            'eventTemplates' => $eventRepository->upcomingEventTemplates()->unique(),
            'tags' => [],//$eventRepository->upcomingTags()->unique(),
        ]);
    }
}
