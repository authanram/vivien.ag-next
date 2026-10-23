<?php

namespace App\Filament\Resources\CookieConsentProviders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CookieConsentProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    TextInput::make('name')
                        ->label(__('Name'))
                        ->required(),
                    TextInput::make('url')
                        ->label(__('URL'))
                        ->url()
                        ->required(),
                ]),
            ]);
    }
}
