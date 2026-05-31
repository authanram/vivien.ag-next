<?php

namespace App\Filament\Resources\QuoteAuthors\Pages;

use App\Filament\Resources\QuoteAuthors\QuoteAuthorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditQuoteAuthor extends EditRecord
{
    protected static string $resource = QuoteAuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
