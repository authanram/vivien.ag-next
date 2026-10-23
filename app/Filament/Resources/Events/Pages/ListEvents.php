<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'upcoming' => Tab::make(__('Upcoming'))
                ->modifyQueryUsing(fn (Builder $query) => $query->upcoming()),
            'past' => Tab::make(__('Past'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('date_from', '<', now())),
            'all' => Tab::make(__('All')),
        ];
    }
}
