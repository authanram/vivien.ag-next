<?php

namespace App\Filament\Resources\EventAttendees\Pages;

use App\Filament\Resources\EventAttendees\EventAttendeeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEventAttendees extends ListRecords
{
    protected static string $resource = EventAttendeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
