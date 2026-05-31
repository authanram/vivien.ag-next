<?php

namespace App\Filament\Resources\Events\Pages;

use App\Enums\Catering;
use App\Filament\Resources\Events\EventResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
