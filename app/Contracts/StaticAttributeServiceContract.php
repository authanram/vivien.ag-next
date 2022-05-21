<?php

namespace App\Contracts;

use App\Contracts\Support\StaticAttributeSupportContract;

interface StaticAttributeServiceContract
{
    public function getBySlug(string $slug): StaticAttributeSupportContract;
}
