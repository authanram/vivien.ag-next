<?php

namespace App\Filament\Resources\EventAttendees;

use App\Filament\Resources\EventAttendees\Pages\CreateEventAttendee;
use App\Filament\Resources\EventAttendees\Pages\EditEventAttendee;
use App\Filament\Resources\EventAttendees\Pages\ListEventAttendees;
use App\Filament\Resources\EventAttendees\Schemas\EventAttendeeForm;
use App\Filament\Resources\EventAttendees\Tables\EventAttendeesTable;
use App\Models\EventAttendee;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventAttendeeResource extends Resource
{
    protected static ?string $model = EventAttendee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('Attendee');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Attendees');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Events');
    }

    public static function form(Schema $schema): Schema
    {
        return EventAttendeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventAttendeesTable::configure($table);
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
            'index' => ListEventAttendees::route('/'),
            'create' => CreateEventAttendee::route('/create'),
            'edit' => EditEventAttendee::route('/{record}/edit'),
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
