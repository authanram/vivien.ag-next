<?php

namespace App\View\Components\Events;

use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Upcoming extends Component
{
    public function render(): string
    {
        return '';
    }

    private static function events(): Collection
    {
        return Event::where('date_from', '>', now())
            ->with(['eventTemplate', 'eventTemplate.color', 'location'])
            ->where('published', true)
            ->limit(3)
            ->orderBy('date_from')
            ->get();
    }
}
