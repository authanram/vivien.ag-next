<?php

namespace App\Filament\Resources\EventLocations\Pages;

use App\Filament\Resources\EventLocations\EventLocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEventLocations extends ListRecords
{
    protected static string $resource = EventLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
