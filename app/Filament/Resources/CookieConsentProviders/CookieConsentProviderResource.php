<?php

namespace App\Filament\Resources\CookieConsentProviders;

use App\Filament\Resources\CookieConsentProviders\Pages\CreateCookieConsentProvider;
use App\Filament\Resources\CookieConsentProviders\Pages\EditCookieConsentProvider;
use App\Filament\Resources\CookieConsentProviders\Pages\ListCookieConsentProviders;
use App\Filament\Resources\CookieConsentProviders\Schemas\CookieConsentProviderForm;
use App\Filament\Resources\CookieConsentProviders\Tables\CookieConsentProvidersTable;
use App\Models\CookieConsentProvider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CookieConsentProviderResource extends Resource
{
    protected static ?string $model = CookieConsentProvider::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('Cookie Provider');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Cookie Providers');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Cookies');
    }

    public static function form(Schema $schema): Schema
    {
        return CookieConsentProviderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CookieConsentProvidersTable::configure($table);
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
            'index' => ListCookieConsentProviders::route('/'),
            'create' => CreateCookieConsentProvider::route('/create'),
            'edit' => EditCookieConsentProvider::route('/{record}/edit'),
        ];
    }
}
