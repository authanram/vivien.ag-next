<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    final public function index(int $routeId): View
    {
        $events = Event::upcoming()
            ->with([
                'eventType',
                'eventType.color',
                'eventLocation',
            ])
            ->limit(3)
            ->orderBy('date_from')
            ->get();

        return view('welcome', $this->defaultData($routeId), compact('events'));
    }
}
