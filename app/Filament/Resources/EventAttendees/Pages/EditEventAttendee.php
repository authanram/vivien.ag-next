<?php

namespace App\Filament\Resources\EventAttendees\Pages;

use App\Filament\Resources\EventAttendees\EventAttendeeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditEventAttendee extends EditRecord
{
    protected static string $resource = EventAttendeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
