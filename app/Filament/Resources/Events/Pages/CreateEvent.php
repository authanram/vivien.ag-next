<?php

namespace App\Filament\Resources\Events\Pages;

use App\Enums\Catering;
use App\Filament\Resources\Events\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['catering'] = collect(Catering::cases())
            ->filter(fn (Catering $case) => $data["catering_{$case->value}"] ?? false)
            ->map(fn (Catering $case) => $case->value)
            ->values()
            ->all();

        foreach (Catering::cases() as $case) {
            unset($data["catering_{$case->value}"]);
        }

        return $data;
    }
}
