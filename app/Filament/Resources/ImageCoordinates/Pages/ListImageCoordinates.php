<?php

namespace App\Filament\Resources\ImageCoordinates\Pages;

use App\Filament\Resources\ImageCoordinates\ImageCoordinatesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImageCoordinates extends ListRecords
{
    protected static string $resource = ImageCoordinatesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
