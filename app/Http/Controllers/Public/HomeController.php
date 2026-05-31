<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $upcomingEvents = Event::published()
            ->upcoming()
            ->with('eventType')
            ->withSum('attendees', 'attendance')
            ->orderBy('date_from')
            ->limit(3)
            ->get();

        $recentEvents = Event::published()
            ->with('eventType')
            ->withSum('attendees', 'attendance')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return Inertia::render('public/Home', [
            'upcomingEvents' => EventResource::collection($upcomingEvents),
            'recentEvents' => EventResource::collection($recentEvents),
        ]);
    }
}
