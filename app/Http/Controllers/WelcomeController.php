<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

final class WelcomeController extends Controller
{
    public function index(int $routeId): View
    {
        $events = Event::upcoming()
            ->with(['eventType', 'eventType.color', 'eventLocation'])
            ->where('published', true)
            ->limit(3)
            ->orderBy('date_from')
            ->get();

        return view('welcome', $this->data($routeId), compact('events'));
    }
}
