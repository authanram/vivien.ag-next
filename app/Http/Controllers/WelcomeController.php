<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

final class WelcomeController extends Controller
{
    private const CACHE_KEY = Event::class.'@'.__CLASS__;

    public function index(int $routeId): View
    {
        $events = Cache::get(self::CACHE_KEY, static fn () => self::cacheEvents());

        return view('welcome', $this->data($routeId), compact('events'));
    }

    protected static function cacheEvents(): Collection
    {
        $events = Event::upcoming()
            ->with(['eventTemplate', 'eventTemplate.color', 'location'])
            ->where('published', true)
            ->limit(3)
            ->orderBy('date_from')
            ->get();

        /** @noinspection PhpUnhandledExceptionInspection */
        Cache::set(self::CACHE_KEY, $events);

        return $events;
    }
}
