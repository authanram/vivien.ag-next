<?php

namespace App\Contracts;

interface StaticAttributesServiceContract
{
    public function attribute(string $slug, $default = null);

    public function get(string $slug, ?array $tags = null);

    public static function toObject(array $array): \stdClass;
}
