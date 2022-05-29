<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use InvalidArgumentException;
use SplFileInfo;

class ClassFinder
{
    protected bool $recursive = false;

    protected array $reject = [];

    private function __construct(protected string $namespace, protected ?string $path = null)
    {
        $this->namespace = self::namespace($this->namespace);

        $this->path ??= static::namespaceToPath($this->namespace);

        if (File::exists($this->path) === false) {
            throw new InvalidArgumentException("Invalid path: $this->path");
        }
    }

    public static function make(string $namespace = '', string $path = null): static
    {
        return new static($namespace, $path);
    }

    public function recursive(): static
    {
        $this->recursive = true;

        return $this;
    }

    public function reject(array|string $reject): static
    {
        $this->reject = is_string($reject) ? [$reject] : $reject;

        return $this;
    }

    public function resolve(): Collection
    {
        $reject = collect($this->reject)
            ->map(fn ($subject) => '\\'.trim($subject, '\\'))
            ->toArray();

        return collect($this->files($this->path))
            ->map(fn (SplFileInfo $fileInfo) => static::classname($fileInfo))
            ->filter(fn (string $classname) => in_array($classname, $reject, true) === false)
            ->values();
    }

    private function files(string $path): array
    {
        return $this->recursive
            ? File::allFiles($path)
            : File::files($path);
    }

    private static function classname(SplFileInfo $fileInfo): string
    {
        $path = str_replace(base_path(), '', $fileInfo->getPath());

        return Str::of(self::pathToNamespace($path))
            ->append('\\')
            ->append($fileInfo->getFilename())
            ->before('.php')
            ->toString();
    }

    private static function pathToNamespace(string $path): string
    {
        return collect(explode('/', $path))
            ->map(fn (string $subject) => ucfirst($subject))
            ->implode('\\');
    }

    private static function namespaceToPath(string $namespace): string
    {
        $path = Str::of($namespace)
            ->replace('App\\', 'app\\')
            ->replace('\\', '/')
            ->toString();

        return base_path($path);
    }

    private static function namespace(string $namespace): string
    {
        return trim($namespace, '\\').'\\';
    }
}
