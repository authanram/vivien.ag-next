<?php

use App\Content;
use App\Contracts\DataServiceContract;
use App\Contracts\StaticAttributesServiceContract;
use App\Resolvers\ClassAttributeResolver;
use App\Services\ParsedownService;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

if (!function_exists('accent')) {
    function accent(Request $request = null): string {
        return data()->getAccent($request ?? request());
    }
}

if (!function_exists('attribute')) {
    function attribute(string $slug, $default = null) {
        return resolve(StaticAttributesServiceContract::class)->attribute($slug, $default);
    }
}

if (!function_exists('carbon')) {
    function carbon(string $date = null): CarbonInterface {
        return $date ? Carbon::createFromFormat(config('app.date_format_default'), $date) : now();
    }
}

if (!function_exists('classAttribute')) {
    function classAttribute(string $item, bool $condition = true, string $default = null): ClassAttributeResolver {
        return ClassAttributeResolver::make($item, $condition, $default);
    }
}

if (!function_exists('content')) {
    function content(string $uuid, bool $markdown = false, array $replaceMap = []): \stdClass {
        try {
            $content = Content::where('uuid', $uuid)->firstOrFail();
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        $body = $content->getAttribute('body');

        if ($markdown) {
            $body = parsedown($body, $replaceMap);
        } else {
            $replace = ['#accent#' => accent(), '#avatar#' => asset('images/sybille-seuffer.jpg')];

            foreach ($replace as $key => $value) {
                $body = \str_replace($key, $value, $body);
            }
        }

        return (object) [
            'body' => $body,
            'slug' => $content->getAttribute('slug'),
        ];
    }
}

if (!function_exists('parsedown')) {
    function parsedown(string $text, array $replaceMap = []): string {
        try {
            $text = app()->make(ParsedownService::class)->parse($text);
        } catch (\Exception $e) {
            abort(505, $e->getMessage());
        }

        $replace = array_merge(
            $replaceMap,
            [
                '<strong>' => '<span class="font-medium">',
                '</strong>' => '</span>',
                '<a ' => '<a class="hover:underline text-{{accent}}-600" ',
                '<h1>' => '<h1 class="text-{{accent}}-600">',
                '<h2>' => '<h2 class="text-{{accent}}-600">',
                '<h3>' => '<h3 class="text-{{accent}}-600">',
                '<h4>' => '<h4 class="text-{{accent}}-600">',
                '<h5>' => '<h5 class="text-{{accent}}-600">',
                '<h6>' => '<h6 class="text-{{accent}}-600">',
                '-accent-' => '-' . accent() . '-',
                'class="headline' => 'class="headline text-{{accent}}-600',
                '{highlight}' => '<span class="font-medium text-'.accent().'-600">',
                '{/highlight}' => '</span>',
                '{{accent}}' => accent(),
            ]
        );

        foreach ($replace as $key => $value) {
            $text = \str_replace($key, $value, $text);
        }

        return '<div class="x-parsedown">'.$text.'</div>';
    }
}

if (!function_exists('readTime')) {
    function readTime(string $subject): string {
        $readTime = round(\str_word_count($subject) / 200);
        return $readTime > 0 ? "$readTime Min. Lesedauer" : 'Lesedauer weniger 1 Min.';
    }
}

if (!function_exists('words')) {
    function words(string $subject): array {
        return explode(' ', $subject);
    }
}

if (!function_exists('truncateWords')) {
    function truncateWords(string $subject, int $length = 50, string $ending = '. . .'): string {
        $words = words($subject);

        if (count($words) <= $length) {
            return $subject;
        }

        return implode(' ', \array_slice($words, 0, 50)) . " $ending ";
    }
}

if (!function_exists('cookieConsent')) {
    function cookieConsent(string $key = null) {
        try {
            $cookie = \json_decode(Cookie::get(config('cookie-consent.cookie_name')), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            Log::alert($e->getMessage());
            return $key ? false : [];
        }

        return $key ? ($cookie[$key] ?? false) : $cookie;
    }
}

if (!function_exists('data')) {
    function data(): DataServiceContract {
        return resolve(DataServiceContract::class);
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat(bool $full = false): string {
        return config('app.date_format' . ($full ? '_full' : ''));
    }
}

if (!function_exists('routeIfExists')) {
    function routeIfExists(string $name, array $parameters = [], string $default = '#'): string {
        return Route::has($name) ? route($name, $parameters) : $default;
    }
}
