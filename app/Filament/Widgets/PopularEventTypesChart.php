<?php

namespace App\Filament\Widgets;

use App\Enums\Color;
use App\Models\Event;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PopularEventTypesChart extends ChartWidget
{
    protected ?string $heading = null;

    protected static ?int $sort = 3;

    protected ?string $pollingInterval = null;

    protected int|string|array $columnSpan = 1;

    public function getHeading(): ?string
    {
        return __('Beliebteste Seminararten');
    }

    protected function getData(): array
    {
        $eventTypes = Event::select('event_type_id', DB::raw('count(*) as total'))
            ->groupBy('event_type_id')
            ->orderByDesc('total')
            ->with('eventType')
            ->get();

        $labels = [];
        $data = [];
        $colors = [];

        foreach ($eventTypes as $entry) {
            $labels[] = $entry->eventType->name;
            $data[] = $entry->total;
            $color = Color::tryFrom($entry->eventType->color);
            $colors[] = $color?->hex() ?? '#94a3b8';
        }

        return [
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
