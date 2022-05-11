<?php

declare(strict_types=1);

namespace App\Markdown\Extensions\Renderables;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Event\DocumentRenderedEvent;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

final class RenderablesExtension implements ConfigurableExtensionInterface
{
    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema(
            'renderables',
            Expect::array()->required()->default([]),
        );
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentParsedEvent::class, [
            new ApplyRenderablesProcessor(),
            'onDocumentParsed',
        ]);

        $environment->addEventListener(DocumentRenderedEvent::class, [
            new RenderablesInlineRenderer(),
            'onDocumentRendered',
        ]);
    }
}
