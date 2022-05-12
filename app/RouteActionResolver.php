<?php

namespace App;

use App\Http\Controllers\ContentViewController;
use App\Http\Controllers\Controller;
use App\Models\ContentView;
use InvalidArgumentException;

final class RouteActionResolver
{
    protected function __construct(protected array $action)
    {
    }

    public static function make(?array $action): self
    {
        $action = data_get($action, '0');

        if (is_null($action)) {
            throw new InvalidArgumentException('Empty route action.');
        }

        return new self($action);
    }

    public function isContentViewControllerAction(): bool
    {
        return $this->controller() === ContentViewController::class;
    }

    public function resolveContentViewControllerAction(): ContentView
    {
        return ContentView::findOrFail($this->subject());
    }

    public function controller(): Controller|string
    {
        return $this->get('attributes.value');
    }

    public function action(): string
    {
        return $this->isContentViewControllerAction() === false
            ? $this->subject()
            : 'index';
    }

    public function subject(): string
    {
        return $this->get('attributes.subject');
    }

    private function get(string $key): mixed
    {
        return data_get($this->action, $key);
    }
}
