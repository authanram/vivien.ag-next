<?php

namespace App\Renderers;

use App\Contracts\IconRendererContract;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

final class IconRenderer implements IconRendererContract
{
    protected static function path(): string
    {
        return rtrim(config('project.paths.icons'), '/');
    }

    /**
     * @throws FileNotFoundException
     */
    protected static function readFromFile(string $icon): string
    {
        return File::get(public_path(self::path().'/'.$icon.'.svg'));
    }

    public function render(string $icon): string
    {
        return Cache::get('icon.'.$icon, static function () use ($icon) {
            $html = self::readFromFile($icon);

            Cache::put('icon.'.$icon, $html);

            return $html;
        });
    }
}
