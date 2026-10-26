<?php

namespace App\Filament\Widgets;

use App\Enums\Weekday;
use App\Models\Event;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EventsByDayChart extends ChartWidget
{
    protected ?string $heading = null;

    protected static ?int $sort = 2;

    protected ?string $pollingInterval = null;

    protected int|string|array $columnSpan = 1;

    public function getHeading(): ?string
    {
        return __('Seminare nach Wochentag');
    }

    protected function getData(): array
    {
        $counts = Event::select('event_day', DB::raw('count(*) as total'))
            ->whereNotNull('event_day')
            ->groupBy('event_day')
            ->pluck('total', 'event_day');

        $labels = [];
        $data = [];

        foreach (Weekday::cases() as $day) {
            $count = $counts->get($day->value, 0);
            if ($count > 0) {
                $labels[] = $day->label();
                $data[] = $count;
            }
        }

        // Sort by count descending
        $combined = collect(array_combine($labels, $data))->sortDesc();

        return [
            'datasets' => [
                [
                    'label' => __('Anzahl Seminare'),
                    'data' => $combined->values()->all(),
                    'backgroundColor' => [
                        '#ec4899', '#f472b6', '#f9a8d4',
                        '#fb7185', '#fda4af', '#fecdd3', '#ffe4e6',
                    ],
                ],
            ],
            'labels' => $combined->keys()->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
