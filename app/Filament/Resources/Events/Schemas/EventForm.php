<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                Select::make('event_type_id')
                    ->relationship('eventType', 'name')
                    ->required(),
                Select::make('event_location_id')
                    ->relationship('eventLocation', 'name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                DateTimePicker::make('date_from')
                    ->required(),
                DateTimePicker::make('date_to')
                    ->required(),
                TextInput::make('maximum_attendees')
                    ->required()
                    ->numeric()
                    ->default(10),
                TextInput::make('reserved_seats')
                    ->numeric(),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
                Textarea::make('price_note')
                    ->columnSpanFull(),
                TextInput::make('catering'),
                Textarea::make('lead')
                    ->columnSpanFull(),
                Toggle::make('published')
                    ->required(),
                TextInput::make('created_by')
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric(),
                TextInput::make('deleted_by')
                    ->numeric(),
            ]);
    }
}
