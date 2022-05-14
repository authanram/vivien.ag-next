<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

final class WelcomeController extends Controller
{
    protected const VIEW = 'welcome';

    private const CACHE_KEY = Event::class.'@'.__CLASS__;

    public function index(Request $request, Route $route): View
    {
        $events = Cache::get(self::CACHE_KEY, static fn () => self::cacheEvents());

        return view('welcome', compact('events'));
    }

    protected static function cacheEvents(): Collection
    {
        return Cache::rememberForever(self::CACHE_KEY, static function () {
            return Event::where('date_from', '>', now())
                ->with(['eventTemplate', 'eventTemplate.color', 'location'])
                ->where('published', true)
                ->limit(3)
                ->orderBy('date_from')
                ->get();
        });
    }
}
