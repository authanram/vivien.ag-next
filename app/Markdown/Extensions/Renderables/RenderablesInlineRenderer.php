<?php

declare(strict_types=1);

namespace App\Markdown\Extensions\Renderables;

use App\Contracts\RenderableComponent;
use League\CommonMark\Event\DocumentRenderedEvent;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;

final class RenderablesInlineRenderer implements ConfigurationAwareInterface
{
    private ConfigurationInterface $config;

    public function onDocumentRendered(DocumentRenderedEvent $event): void
    {
        $content = $event->getOutput()->getContent();

        $renderables = $this->config->get('renderables');

        /** @var RenderableComponent $component */
        foreach($renderables as $componentKey => $component) {
            $matches = [];

            preg_match_all('/%'.$componentKey.':(.*?)%/i', $content, $matches);

            if (count($matches[1]) === 0) {
                return;
            }

            foreach ($matches[1] as $key => $value) {
                $rendered = $component::render($value);

                if (is_null($rendered)) {
                    continue;
                }

                $content = str_replace($matches[0][$key], $rendered, $content);
            }
        }

        $output = new RenderablesRenderedContent(
            $event->getOutput()->getDocument(),
            $content,
        );

        $event->replaceOutput($output);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }
}
