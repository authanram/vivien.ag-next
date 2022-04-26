<?php

namespace App\Http\Controllers;

use App\Contracts\EventServiceContract;
use Illuminate\View\View;

final class EventsController extends Controller
{
    public function index(int $routeId): View
    {
        $hasEvents = resolve(EventServiceContract::class)->hasUpcomingEvents();

        $data = array_merge(
            $this->data($routeId),
            compact('hasEvents')
        );

        return view('events.index', $data);
    }
}
