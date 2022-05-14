<?php

namespace App\Contracts;

/**
 * @property int $id
 * @property string $name
 */
interface Routable
{
    public function routable(): \App\Routables\Routable;
}
