<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;
use App\QueryBuilders\EventQueryBuilder;

final class EventsController extends Controller
{
    public function index(int $routeId): View
    {
        $events = EventQueryBuilder::build();

        $eventTemplates = Event::where('date_to', '>', now())->get()->pluck('eventTemplate');

        return view('events.index', compact('events', 'eventTemplates'));
    }
}
