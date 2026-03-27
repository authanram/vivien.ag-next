<?php

namespace App\Filament\Resources\QuoteAuthors;

use App\Filament\Resources\QuoteAuthors\Pages\CreateQuoteAuthor;
use App\Filament\Resources\QuoteAuthors\Pages\EditQuoteAuthor;
use App\Filament\Resources\QuoteAuthors\Pages\ListQuoteAuthors;
use App\Filament\Resources\QuoteAuthors\Schemas\QuoteAuthorForm;
use App\Filament\Resources\QuoteAuthors\Tables\QuoteAuthorsTable;
use App\Models\QuoteAuthor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuoteAuthorResource extends Resource
{
    protected static ?string $model = QuoteAuthor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('Quote Author');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Quote Authors');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Quotes');
    }

    public static function form(Schema $schema): Schema
    {
        return QuoteAuthorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuoteAuthorsTable::configure($table);
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
            'index' => ListQuoteAuthors::route('/'),
            'create' => CreateQuoteAuthor::route('/create'),
            'edit' => EditQuoteAuthor::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
