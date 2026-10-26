<?php

namespace App\Filament\Resources\CookieConsentCookies\Pages;

use App\Filament\Resources\CookieConsentCookies\CookieConsentCookieResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCookieConsentCookie extends EditRecord
{
    protected static string $resource = CookieConsentCookieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
