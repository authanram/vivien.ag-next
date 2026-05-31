<?php

namespace App\Providers;

use App\Services\NumberFormatterService;
use Filament\Facades\Filament;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        TextInput::macro('money', fn (string $currency = 'EUR') => $this
            ->afterStateHydrated(static function (TextInput $component, mixed $state) use ($currency): void {
                if (blank($state)) {
                    return;
                }

                // @codeCoverageIgnoreStart
                if (! is_numeric($state)) {
                    $state = resolve(NumberFormatterService::class)->formatFromMoney($state, $currency);
                }
                // @codeCoverageIgnoreEnd

                $component->state(resolve(NumberFormatterService::class)->format($state / 100));
            })
            ->dehydrateStateUsing(static fn ($state): int => blank($state) === false
                ? resolve(NumberFormatterService::class)->formatFromMoney($state, $currency)
                : 0));

        TextColumn::macro('enum', fn () => $this->formatStateUsing(fn ($state) => $state?->label()));

        Filament::serving(function (): void {

            DatePicker::configureUsing(fn (DatePicker $input): DatePicker => $input->native(false)->translateLabel()->displayFormat('d.m.Y'));
            DateTimePicker::configureUsing(fn (DateTimePicker $input): DateTimePicker => $input
                ->native(false)
                ->translateLabel()
                ->displayFormat('d.m.Y H:i')
                ->timezone(fn () => auth()->user()?->timezone ?? 'Europe/Berlin')
            );
            TextInput::configureUsing(fn (TextInput $input): TextInput => $input->maxLength(255)->translateLabel());
            Select::configureUsing(fn (Select $input): Select => $input->translateLabel());
            TextColumn::configureUsing(fn (TextColumn $column): TextColumn => $column->translateLabel());
            FileUpload::configureUsing(fn (FileUpload $input): FileUpload => $input->translateLabel());
            Repeater::configureUsing(fn (Repeater $input): Repeater => $input->translateLabel());
            Block::configureUsing(fn (Block $input): Block => $input->translateLabel());
            RichEditor::configureUsing(fn (RichEditor $input): RichEditor => $input->translateLabel()->disableToolbarButtons(['codeBlock', 'blockquote']));
            Toggle::configureUsing(fn (Toggle $input): Toggle => $input->translateLabel());

            Table::configureUsing(function (Table $table): void {
                $table->paginationPageOptions([5, 10, 25, 50, 100]);
            });
        });
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
}
