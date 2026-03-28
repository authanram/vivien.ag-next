<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\Catering;
use App\Enums\EventLocation;
use App\Enums\Weekday;
use App\Filament\Resources\Events\EventResource;
use App\Models\Event;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('display_name')
                    ->label(__('Seminar'))
                    ->html()
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
                    ->description(fn (Event $record): string => str(
                        $record->event_location === EventLocation::Other
                            ? $record->custom_event_location
                            : $record->event_location->label()
                    )->limit(25)),
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
                    ->label(__('Participants'))
                    ->default(0)
                    ->formatStateUsing(fn ($state, Event $record): string => "{$state}/{$record->maximum_attendees}")
                    ->sortable(),
                TextColumn::make('price')
                    ->label(__('Price'))
                    ->formatStateUsing(fn ($state): string => $state ? number_format($state / 100, 2, ',', '.').' €' : '—')
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
            ->defaultSort('date_from', 'asc')
            ->filters([
                SelectFilter::make('event_type_id')
                    ->label(__('Event Type'))
                    ->relationship('eventType', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('event_location')
                    ->label(__('Event Location'))
                    ->options(EventLocation::toOptions()),
                SelectFilter::make('event_day')
                    ->label(__('Event Day'))
                    ->options(Weekday::toOptions()),
                SelectFilter::make('catering')
                    ->label(__('Catering'))
                    ->options(Catering::toOptions())
                    ->query(fn (Builder $query, array $data): Builder => filled($data['value'])
                        ? $query->whereJsonContains('catering', $data['value'])
                        : $query,
                    ),
                TernaryFilter::make('published')
                    ->label(__('Online')),
                TrashedFilter::make(),
            ])
            ->recordActions([
                ReplicateAction::make()
                    ->excludeAttributes(['uuid'])
                    ->modalHeading(__('Seminar duplizieren'))
                    ->modalDescription(fn (Event $record): HtmlString => new HtmlString(implode('<br>', [
                        '<strong>'.e($record->display_name).'</strong>',
                        e($record->event_location === EventLocation::Other ? $record->custom_event_location : $record->event_location->label()),
                        e($record->date_from->format('d.m.Y')).' – '.e($record->date_to->format('d.m.Y')),
                    ])))
                    ->successRedirectUrl(fn (Event $replica): string => EventResource::getUrl('edit', ['record' => $replica])),
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
