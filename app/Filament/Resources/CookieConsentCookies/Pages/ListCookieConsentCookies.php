<?php

namespace App\Filament\Resources\CookieConsentCookies\Pages;

use App\Filament\Resources\CookieConsentCookies\CookieConsentCookieResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCookieConsentCookies extends ListRecords
{
    protected static string $resource = CookieConsentCookieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
