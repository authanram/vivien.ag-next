<?php

namespace App\Filament\Resources\CookieConsentCookies;

use App\Filament\Resources\CookieConsentCookies\Pages\CreateCookieConsentCookie;
use App\Filament\Resources\CookieConsentCookies\Pages\EditCookieConsentCookie;
use App\Filament\Resources\CookieConsentCookies\Pages\ListCookieConsentCookies;
use App\Filament\Resources\CookieConsentCookies\Schemas\CookieConsentCookieForm;
use App\Filament\Resources\CookieConsentCookies\Tables\CookieConsentCookiesTable;
use App\Models\CookieConsentCookie;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CookieConsentCookieResource extends Resource
{
    protected static ?string $model = CookieConsentCookie::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('Cookie');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Cookies');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Cookies');
    }

    public static function form(Schema $schema): Schema
    {
        return CookieConsentCookieForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CookieConsentCookiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCookieConsentCookies::route('/'),
            'create' => CreateCookieConsentCookie::route('/create'),
            'edit' => EditCookieConsentCookie::route('/{record}/edit'),
        ];
    }
}
