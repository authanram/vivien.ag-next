<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\EventAttendee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EventsStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $total = Event::count();
        $upcoming = Event::where('date_from', '>=', now())->count();
        $past = $total - $upcoming;

        $plannedRevenue = Event::where('date_from', '>=', now())
            ->selectRaw('sum(price * maximum_attendees) as total')
            ->value('total') ?? 0;

        $confirmedAttendanceRevenue = EventAttendee::where('confirmed', true)
            ->whereHas('event', fn ($q) => $q->where('date_from', '>=', now()))
            ->join('events', 'events.id', '=', 'event_attendees.event_id')
            ->whereNull('event_attendees.deleted_at')
            ->selectRaw('sum(events.price * event_attendees.attendance) as total')
            ->value('total') ?? 0;

        $reservedRevenue = Event::where('date_from', '>=', now())
            ->whereNotNull('reserved_seats')
            ->selectRaw('sum(price * reserved_seats) as total')
            ->value('total') ?? 0;

        $confirmedRevenue = $confirmedAttendanceRevenue + $reservedRevenue;

        $totalAttendance = EventAttendee::whereHas('event', fn ($q) => $q->where('date_from', '>=', now()))
            ->sum('attendance');

        return [
            Stat::make(__('Seminare gesamt'), $total)
                ->description(__(':upcoming kommend, :past vergangen', ['upcoming' => $upcoming, 'past' => $past]))
                ->color('primary'),
            Stat::make(__('Anmeldungen'), $totalAttendance)
                ->description(__('Für kommende Seminare'))
                ->color('warning'),
            Stat::make(__('Geplante Einnahmen'), number_format($plannedRevenue / 100, 2, ',', '.').' €')
                ->description(__('Bei voller Auslastung'))
                ->color('success'),
            Stat::make(__('Eingebuchte Einnahmen'), number_format($confirmedRevenue / 100, 2, ',', '.').' €')
                ->description(__('Aus :count Teilnehmern + Reservierungen', ['count' => $totalAttendance]))
                ->color('info'),
        ];
    }
}
