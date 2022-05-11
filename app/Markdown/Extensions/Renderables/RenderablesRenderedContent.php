<?php

declare(strict_types=1);

namespace App\Markdown\Extensions\Renderables;

use League\CommonMark\Node\Block\Document;
use League\CommonMark\Output\RenderedContentInterface;

final class RenderablesRenderedContent implements RenderedContentInterface
{
    public function __construct(
        private Document $document,
        private string $content,
    ) {
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function __toString()
    {
        return $this->getContent();
    }
}
