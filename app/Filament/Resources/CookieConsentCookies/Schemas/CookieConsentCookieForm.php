<?php

namespace App\Filament\Resources\CookieConsentCookies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CookieConsentCookieForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    TextInput::make('cookie_name')
                        ->label(__('Cookie Name'))
                        ->unique()
                        ->required(),
                    Select::make('cookie_consent_provider_id')
                        ->label(__('Cookie Provider'))
                        ->relationship('cookieConsentProvider', 'name')
                        ->required(),
                    TextInput::make('cookie_category')
                        ->label(__('Cookie Category'))
                        ->default('Notwendig')
                        ->required(),
                    TextInput::make('cookie_type')
                        ->label(__('Cookie Type'))
                        ->default('HTTP')
                        ->required(),
                    TextInput::make('cookie_lifetime')
                        ->label(__('Cookie Lifetime'))
                        ->helperText(__('In days, 0 = session.'))
                        ->numeric()
                        ->minValue(0)
                        ->required(),
                    Toggle::make('encrypted')
                        ->label(__('Encrypted')),
                    Toggle::make('required')
                        ->label(__('Required')),
                    Textarea::make('cookie_purpose')
                        ->label(__('Cookie Purpose'))
                        ->helperText(__('HTML is allowed.'))
                        ->rows(10)
                        ->required()
                        ->columnSpanFull(),
                ]),
            ]);
    }
}
