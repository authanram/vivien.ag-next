<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;
use Filament\Support\Colors\Color as FilamentColor;
use Illuminate\Support\Collection;

enum Color: string
{
    use HasEnumOptions;

    case Gray = 'gray';
    case Taupe = 'taupe';
    case Red = 'red';
    case Orange = 'orange';
    case Amber = 'amber';
    case Yellow = 'yellow';
    case Lime = 'lime';
    case Green = 'green';
    case Emerald = 'emerald';
    case Teal = 'teal';
    case Cyan = 'cyan';
    case Sky = 'sky';
    case Blue = 'blue';
    case Indigo = 'indigo';
    case Violet = 'violet';
    case Purple = 'purple';
    case Fuchsia = 'fuchsia';
    case Pink = 'pink';
    case Rose = 'rose';

    public function label(): string
    {
        return match ($this) {
            self::Gray => __('Gray'),
            self::Taupe => __('Taupe'),
            self::Red => __('Red'),
            self::Orange => __('Orange'),
            self::Amber => __('Amber'),
            self::Yellow => __('Yellow'),
            self::Lime => __('Lime'),
            self::Green => __('Green'),
            self::Emerald => __('Emerald'),
            self::Teal => __('Teal'),
            self::Cyan => __('Cyan'),
            self::Sky => __('Sky'),
            self::Blue => __('Blue'),
            self::Indigo => __('Indigo'),
            self::Violet => __('Violet'),
            self::Purple => __('Purple'),
            self::Fuchsia => __('Fuchsia'),
            self::Pink => __('Pink'),
            self::Rose => __('Rose'),
        };
    }

    public function hex(): string
    {
        $colors = match ($this) {
            self::Gray => FilamentColor::Gray,
            self::Taupe => FilamentColor::Taupe,
            self::Red => FilamentColor::Red,
            self::Orange => FilamentColor::Orange,
            self::Amber => FilamentColor::Amber,
            self::Yellow => FilamentColor::Yellow,
            self::Lime => FilamentColor::Lime,
            self::Green => FilamentColor::Green,
            self::Emerald => FilamentColor::Emerald,
            self::Teal => FilamentColor::Teal,
            self::Cyan => FilamentColor::Cyan,
            self::Sky => FilamentColor::Sky,
            self::Blue => FilamentColor::Blue,
            self::Indigo => FilamentColor::Indigo,
            self::Violet => FilamentColor::Violet,
            self::Purple => FilamentColor::Purple,
            self::Fuchsia => FilamentColor::Fuchsia,
            self::Pink => FilamentColor::Pink,
            self::Rose => FilamentColor::Rose,
        };

        return $colors[500];
    }

    public function htmlLabel(): string
    {
        return '<span style="display:inline-flex;align-items:center;gap:8px;"><span style="display:inline-block;width:12px;height:12px;border-radius:50%;background:'.$this->hex().';"></span>'.e($this->label()).'</span>';
    }

    public static function toHtmlOptions(): Collection
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $case) => [
                $case->value => $case->htmlLabel(),
            ]);
    }
}
