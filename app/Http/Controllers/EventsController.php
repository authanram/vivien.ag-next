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
        $repository = $this->siteService->repositories()->events();

        $events = $repository->queryBuilder();

        $eventTemplates = $repository->upcoming()->get()->pluck('eventTemplate');

        return view('events.index', compact('events', 'eventTemplates'));
    }
}
