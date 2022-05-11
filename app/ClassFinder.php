<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class ClassFinder
{
    public static function resolve(string $path, string $namespace = ''): Collection
    {
        return self::controllers($path, $namespace);
    }

    private static function controllers(string $path, string $namespace): Collection
    {
        return static::map($path, static function (SplFileInfo $fileInfo) use ($namespace) {
            $subject = static::classname(
                $fileInfo->getFilename(),
                $namespace,
            );

            return is_subclass_of($subject, Controller::class)
                ? $subject
                : null;
        });
    }

    private static function map(string $path, callable $mapper): Collection
    {
        return collect(File::files($path))->map($mapper)->filter()->values();
    }

    private static function classname(string $filename, string $namespace): string
    {
        return $namespace.str_replace('.php', '', $filename);
    }
}
