<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
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
                Section::make()->columnSpanFull()->schema([
                    Select::make('event_type_id')
                        ->label(__('Event Type'))
                        ->relationship('eventType', 'name')
                        ->required(),
                    Select::make('event_location_id')
                        ->label(__('Event Location'))
                        ->relationship('eventLocation', 'name')
                        ->required(),
                    Textarea::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),
                    DateTimePicker::make('date_from')
                        ->label(__('Date From'))
                        ->required(),
                    DateTimePicker::make('date_to')
                        ->label(__('Date To'))
                        ->required(),
                    TextInput::make('maximum_attendees')
                        ->label(__('Max. Attendees'))
                        ->required()
                        ->numeric()
                        ->default(10),
                    TextInput::make('reserved_seats')
                        ->label(__('Reserved Seats'))
                        ->numeric(),
                    TextInput::make('price')
                        ->label(__('Price'))
                        ->numeric()
                        ->prefix('\u20ac'),
                    Textarea::make('price_note')
                        ->label(__('Price Note'))
                        ->columnSpanFull(),
                    TextInput::make('catering')
                        ->label(__('Catering')),
                    Textarea::make('lead')
                        ->label(__('Introduction'))
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
