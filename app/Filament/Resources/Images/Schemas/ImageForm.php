<?php

namespace App\Filament\Resources\Images\Schemas;

use App\Enums\ImageArtist;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columnSpanFull()->columns(2)->schema([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->label(__('Image'))
                        ->collection('image')
                        ->disk('public')
                        ->image()
                        ->imageEditor()
                        ->columnSpanFull(),
                    TextInput::make('title')
                        ->label(__('Title')),
                    TextInput::make('description')
                        ->label(__('Description')),
                    TextInput::make('price')
                        ->label(__('Price'))
                        ->money()
                        ->prefix('€'),
                    Select::make('artist')
                        ->label(__('Artist'))
                        ->options(ImageArtist::toOptions())
                        ->default(ImageArtist::SybilleSeuffer->value)
                        ->live(),
                    TextInput::make('artist_custom')
                        ->label(__('Custom Artist'))
                        ->visible(fn ($get) => $get('artist') === ImageArtist::Other->value)
                        ->required(fn ($get) => $get('artist') === ImageArtist::Other->value),
                    Toggle::make('published')
                        ->label(__('Published'))
                        ->required(),
                ]),
            ]);
    }
}
