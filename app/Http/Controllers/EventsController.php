<?php

namespace App\Http\Controllers;

use App\Contracts\SiteServiceContract;
use Illuminate\View\View;

final class EventsController extends Controller
{
    public function __construct(protected SiteServiceContract $siteService)
    {
    }

    public function index(int $routeId): View
    {
        $eventRepository = $this->siteService->repositories()->events();

        $events = $eventRepository->queryBuilder();

        $eventTemplatesRepository = $this->siteService->repositories()->eventsTemplates();

        $eventTemplates = $eventTemplatesRepository->whereInEvents($eventRepository->upcoming()->get());

        return view('events.index', compact('events', 'eventTemplates'));
    }
}
