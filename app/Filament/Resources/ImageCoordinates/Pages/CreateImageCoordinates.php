<?php

namespace App\Filament\Resources\ImageCoordinates\Pages;

use App\Filament\Resources\ImageCoordinates\ImageCoordinatesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateImageCoordinates extends CreateRecord
{
    protected static string $resource = ImageCoordinatesResource::class;

    protected string $view = 'filament.resources.image-coordinates.pages.form-with-preview';
}
