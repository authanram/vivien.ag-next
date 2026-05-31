<?php

namespace App\Filament\Resources\Images\Tables;

use App\Enums\ImageArtist;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->label(__('Image'))
                    ->collection('image')
                    ->conversion('thumb')
                    ->square()
                    ->size(60),
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->description(fn ($record): ?string => $record->description)
                    ->searchable(query: fn ($query, string $search) => $query
                        ->where('title', 'ilike', "%{$search}%")
                        ->orWhere('description', 'ilike', "%{$search}%")
                    ),
                TextColumn::make('price')
                    ->label(__('Price'))
                    ->money('EUR', divideBy: 100)
                    ->default(0)
                    ->sortable(),
                TextColumn::make('artist')
                    ->label(__('Artist'))
                    ->formatStateUsing(fn ($state, $record): string => $state === ImageArtist::Other
                        ? ($record->artist_custom ?? '—')
                        : ($state instanceof ImageArtist ? $state->label() : ($state ?? '—')))
                    ->sortable(),
                IconColumn::make('published')
                    ->label(__('Published'))
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
