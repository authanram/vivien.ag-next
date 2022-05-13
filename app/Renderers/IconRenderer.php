<?php

namespace App\Renderers;

use App\Contracts\Renderer;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

final class IconRenderer implements Renderer
{
    public function __construct(protected string $icon)
    {
    }

    public function render(): string
    {
        return Cache::get('icon.'.$this->icon, function () {
            $html = self::readFromFile($this->icon);

            Cache::put('icon.'.$this->icon, $html);

            return $html;
        });
    }

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
}
