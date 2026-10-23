<?php

namespace App\Filament\Resources\CookieConsentProviders\Pages;

use App\Filament\Resources\CookieConsentProviders\CookieConsentProviderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCookieConsentProvider extends EditRecord
{
    protected static string $resource = CookieConsentProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
