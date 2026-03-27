<?php

namespace App\Filament\Resources\EventLocations;

use App\Filament\Resources\EventLocations\Pages\CreateEventLocation;
use App\Filament\Resources\EventLocations\Pages\EditEventLocation;
use App\Filament\Resources\EventLocations\Pages\ListEventLocations;
use App\Filament\Resources\EventLocations\Schemas\EventLocationForm;
use App\Filament\Resources\EventLocations\Tables\EventLocationsTable;
use App\Models\EventLocation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventLocationResource extends Resource
{
    protected static ?string $model = EventLocation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EventLocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventLocationsTable::configure($table);
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
            'index' => ListEventLocations::route('/'),
            'create' => CreateEventLocation::route('/create'),
            'edit' => EditEventLocation::route('/{record}/edit'),
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
