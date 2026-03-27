<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Enums\Catering;
use App\Enums\Color;
use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Models\EventType;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    Select::make('event_type_id')
                        ->label(__('Event Type'))
                        ->relationship('eventType', 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            TextInput::make('name')
                                ->label(__('Name'))
                                ->required(),
                            Select::make('color')
                                ->label(__('Color'))
                                ->options(Color::toHtmlOptions())
                                ->allowHtml()
                                ->searchable()
                                ->required(),
                            Textarea::make('description')
                                ->label(__('Description'))
                                ->columnSpanFull(),
                        ])
                        ->createOptionUsing(function (array $data): string {
                            return EventType::firstOrCreate(
                                ['name' => $data['name']],
                            )->getKey();
                        })
                        ->required()
                        ->live()
                        ->afterStateUpdated(function ($state, $set) {
                            $set('description', EventType::find($state)?->description);
                        }),
                    Select::make('event_day')
                        ->label(__('Event Day'))
                        ->options(Weekday::toOptions())
                        ->required(),
                    Select::make('event_location')
                        ->label(__('Event Location'))
                        ->options(EventLocation::toOptions())
                        ->default(EventLocation::Jaegerstrasse->value)
                        ->required()
                        ->live(),
                    TextInput::make('custom_event_location')
                        ->label(__('Custom Event Location'))
                        ->visible(fn ($get) => $get('event_location') === EventLocation::Other->value)
                        ->required(fn ($get) => $get('event_location') === EventLocation::Other->value)
                        ->placeholder('z.B. "Auf Nebenstrecken" oder "Kloster Kirchberg, Kirchberg 1, 72172 Sulz am Neckar"'),
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
                        ->money()
                        ->prefix('€'),
                    TextInput::make('lead')
                        ->label(__('Lead'))
                        ->default('Sybille Seuffer'),
                    CheckboxList::make('catering')
                        ->label(__('Catering'))
                        ->options(Catering::toOptions())
                        ->columnSpanFull(),
                    Textarea::make('price_note')
                        ->label(__('Price Note'))
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
