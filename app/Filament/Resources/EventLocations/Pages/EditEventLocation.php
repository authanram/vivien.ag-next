<?php

namespace App\Filament\Resources\EventLocations\Pages;

use App\Filament\Resources\EventLocations\EventLocationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditEventLocation extends EditRecord
{
    protected static string $resource = EventLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
