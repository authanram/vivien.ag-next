<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class HomePage extends Page
{
    public function url(): string
    {
        return '/';
    }

    public function assert(Browser $browser): void
    {
        //
    }

    public function elements(): array
    {
        return [
            '@element' => '#selector',
        ];
    }
}
