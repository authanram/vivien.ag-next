<?php

namespace App\Filament\Resources\CookieConsentProviders\Pages;

use App\Filament\Resources\CookieConsentProviders\CookieConsentProviderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCookieConsentProviders extends ListRecords
{
    protected static string $resource = CookieConsentProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
