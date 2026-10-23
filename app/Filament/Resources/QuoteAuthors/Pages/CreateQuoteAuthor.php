<?php

namespace App\Filament\Resources\QuoteAuthors\Pages;

use App\Filament\Resources\QuoteAuthors\QuoteAuthorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuoteAuthor extends CreateRecord
{
    protected static string $resource = QuoteAuthorResource::class;
}
