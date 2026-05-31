<?php

namespace App\Filament\Resources\ImageCoordinates\Pages;

use App\Filament\Resources\ImageCoordinates\ImageCoordinatesResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditImageCoordinates extends EditRecord
{
    protected static string $resource = ImageCoordinatesResource::class;

    protected string $view = 'filament.resources.image-coordinates.pages.edit-image-coordinates';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
