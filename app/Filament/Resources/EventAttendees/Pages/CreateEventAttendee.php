<?php

namespace App\Filament\Resources\EventAttendees\Pages;

use App\Filament\Resources\EventAttendees\EventAttendeeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventAttendee extends CreateRecord
{
    protected static string $resource = EventAttendeeResource::class;
}
