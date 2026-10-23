<?php

namespace App\Enums;

use App\Traits\HasEnumOptions;

enum ImageArtist: string
{
    use HasEnumOptions;

    case SybilleSeuffer = 'sybille_seuffer';
    case RobertSeuffer = 'robert_seuffer';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::SybilleSeuffer => __('Sybille Seuffer'),
            self::RobertSeuffer => __('Robert Seuffer'),
            self::Other => __('Other artist'),
        };
    }
}
