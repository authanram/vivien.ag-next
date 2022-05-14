<?php

namespace App\Renderers;

use App\Contracts\IconRenderer as Contract;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

final class IconRenderer implements Contract
{
    public function render(string $icon = null): string
    {
        return Cache::rememberForever("icon.$icon", static fn () => self::fileContents($icon));
    }

    protected static function path(): string
    {
        return rtrim(config('project.paths.icons'), '/');
    }

    /**
     * @throws FileNotFoundException
     */
    protected static function fileContents(string $icon): string
    {
        return File::get(public_path(self::path().'/'.$icon.'.svg'));
    }
}
