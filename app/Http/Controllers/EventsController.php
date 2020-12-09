<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EventsController extends Controller
{
    final public function index(int $routeId): View
    {
        $hasEvents = app()->make(\App\Contracts\EventServiceContract::class)->hasUpcomingEvents();

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('events.events', array_merge(
            $this->defaultData($routeId),
            compact('hasEvents'))
        );
    }
}
