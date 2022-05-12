<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class ClassFinder
{
    public static function resolve(string $path, string $namespace = '', callable $authorize = null): Collection
    {
        return self::controllers($path, $namespace, $authorize);
    }

    private static function controllers(string $path, string $namespace, callable $authorize = null): Collection
    {
        return static::map($path, static function (SplFileInfo $fileInfo) use ($authorize, $namespace) {
            $subject = static::classname(
                $fileInfo->getFilename(),
                $namespace,
            );

            return ($authorize ?? static fn () => $subject)($subject) ? $subject : null;
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
