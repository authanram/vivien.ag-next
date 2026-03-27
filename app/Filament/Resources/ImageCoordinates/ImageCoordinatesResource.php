<?php

namespace App\Filament\Resources\ImageCoordinates;

use App\Filament\Resources\ImageCoordinates\Pages\CreateImageCoordinates;
use App\Filament\Resources\ImageCoordinates\Pages\EditImageCoordinates;
use App\Filament\Resources\ImageCoordinates\Pages\ListImageCoordinates;
use App\Filament\Resources\ImageCoordinates\Schemas\ImageCoordinatesForm;
use App\Filament\Resources\ImageCoordinates\Tables\ImageCoordinatesTable;
use App\Models\ImageCoordinates;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageCoordinatesResource extends Resource
{
    protected static ?string $model = ImageCoordinates::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('Image Coordinate');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Image Coordinates');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Media');
    }

    public static function form(Schema $schema): Schema
    {
        return ImageCoordinatesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImageCoordinatesTable::configure($table);
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
            'index' => ListImageCoordinates::route('/'),
            'create' => CreateImageCoordinates::route('/create'),
            'edit' => EditImageCoordinates::route('/{record}/edit'),
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
