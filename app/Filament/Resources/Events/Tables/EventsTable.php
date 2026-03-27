<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\Catering;
use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Models\Event;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('display_name')
                    ->label(__('Seminar'))
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        $matchingDays = collect(Weekday::cases())
                            ->filter(fn (Weekday $day) => str($day->label())->lower()->contains(str($search)->lower()))
                            ->map(fn (Weekday $day) => $day->value);

                        $matchingLocations = collect(EventLocation::cases())
                            ->filter(fn (EventLocation $loc) => str($loc->label())->lower()->contains(str($search)->lower()))
                            ->map(fn (EventLocation $loc) => $loc->value);

                        return $query->where(function (Builder $q) use ($search, $matchingDays, $matchingLocations) {
                            $q->whereHas('eventType', fn (Builder $q) => $q->where('name', 'ilike', "%{$search}%"));

                            if ($matchingDays->isNotEmpty()) {
                                $q->orWhereIn('event_day', $matchingDays);
                            }

                            if ($matchingLocations->isNotEmpty()) {
                                $q->orWhereIn('event_location', $matchingLocations);
                            }

                            $q->orWhere('custom_event_location', 'ilike', "%{$search}%");
                        });
                    })
                    ->description(fn (Event $record): string => str($record->custom_event_location ?? $record->event_location->label())->limit(25)),
                TextColumn::make('date_from')
                    ->label(__('Start'))
                    ->date('d.m.Y')
                    ->description(fn (Event $record): string => $record->date_from->format('H:i').' Uhr')
                    ->sortable(),
                TextColumn::make('date_to')
                    ->label(__('End'))
                    ->date('d.m.Y')
                    ->description(fn (Event $record): string => $record->date_to->format('H:i').' Uhr')
                    ->sortable(),
                TextColumn::make('reserved_seats')
                    ->label(__('Registrations'))
                    ->default(0)
                    ->formatStateUsing(fn ($state, Event $record): string => "{$state}/{$record->maximum_attendees}")
                    ->sortable(),
                TextColumn::make('price')
                    ->label(__('Price'))
                    ->money('EUR', divideBy: 100)
                    ->placeholder('—')
                    ->sortable(),
                TextColumn::make('catering')
                    ->label(__('Catering'))
                    ->badge()
                    ->listWithLineBreaks()
                    ->formatStateUsing(fn (string $state): string => Catering::tryFrom($state)?->label() ?? $state),
                IconColumn::make('published')
                    ->label(__('Online'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label(__('Deleted At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_by')
                    ->label(__('Created By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_by')
                    ->label(__('Updated By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_by')
                    ->label(__('Deleted By'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
