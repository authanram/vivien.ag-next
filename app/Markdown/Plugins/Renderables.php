<?php

declare(strict_types=1);

namespace App\Markdown\Plugins;

use App\Markdown\Extensions\Renderables\RenderablesExtension;
use App\Markdown\Plugins\RenderableComponents\ContentBlock;
use Authanram\Markdown\Plugin;
use League\CommonMark\Extension\ExtensionInterface;

class Renderables extends Plugin
{
    public static function config(array $config): array
    {
        return [
            'renderables' => [
                'block' => ContentBlock::class,
            ],
        ];
    }

    public static function extension(): ExtensionInterface
    {
        return new RenderablesExtension();
    }
}
