<?php /** @noinspection PhpStaticAsDynamicMethodCallInspection */

namespace App\Http\Controllers;

use App\Models\Event;
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
            ->where('published', true)
            ->limit(3)
            ->orderBy('date_from')
            ->get();

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('welcome', $this->defaultData($routeId), compact('events'));
    }
}
