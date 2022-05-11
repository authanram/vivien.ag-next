<?php

declare(strict_types=1);

namespace App\Markdown\Extensions\Renderables;

use League\CommonMark\Event\DocumentParsedEvent;

final class ApplyRenderablesProcessor
{
    public function onDocumentParsed(DocumentParsedEvent $event): void
    {
    }
}
