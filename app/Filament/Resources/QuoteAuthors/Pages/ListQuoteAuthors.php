<?php

namespace App\Filament\Resources\QuoteAuthors\Pages;

use App\Filament\Resources\QuoteAuthors\QuoteAuthorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuoteAuthors extends ListRecords
{
    protected static string $resource = QuoteAuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
