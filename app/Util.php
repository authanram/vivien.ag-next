<?php

namespace App;

use App\Contracts\DataServiceContract;
use App\Models\Content as Model;
use App\Services\ParsedownService;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\View\ComponentAttributeBag;
use JsonException;
use Route;

final class Util
{
    public static function accent(Request $request = null): string
    {
        return self::data()->getAccent($request ?? request());
    }

    public static function attributes(array $attributes = []): ComponentAttributeBag
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return new ComponentAttributeBag($attributes);
    }

    public static function cookieConsent(string $key = null): mixed
    {
        $cookie = Cookie::get(config('cookie-consent.cookie_name'));

        try {
            $subject = json_decode($cookie, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            Log::alert($exception->getMessage());

            return $key ? false : [];
        }

        return $key ? ($subject[$key] ?? false) : $subject;
    }

    public static function content(string $slug, bool $markdown = false, array $replace = []): \stdClass
    {
        try {
            /** @noinspection PhpStaticAsDynamicMethodCallInspection */
            $content = Model::where('slug', $slug)->firstOrFail();
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

        $body = $markdown
            ? self::markdown($content->body, $replace)
            : $content->body;

        $map = config('project.content.replace');

        foreach ($map as $key => $value) {
            $body = str_replace($key, $value, $body);
        }

        return (object) [
            'body' => $body,
            'slug' => $content->getAttribute('slug'),
        ];
    }

    public static function data(): DataServiceContract
    {
        return resolve(DataServiceContract::class);
    }

    public static function date(string $date = null): CarbonInterface|string
    {
        return $date
            ? Carbon::createFromFormat(config('app.date_format_default'), $date)
            : now(config('app.date_format_default'));

    }

    public static function markdown(string $markdown, array $replace = []): string
    {
        try {
            $html = resolve(ParsedownService::class)->parse($markdown);
        } catch (Exception $exception) {
            abort(505, $exception->getMessage());
        }

        $replace = array_merge($replace, config('project.parsedown.replace'));

        foreach ($replace as $key => $value) {
            $html = str_replace($key, $value, $html);
        }

        return '<div class="x-parsedown">'.$html.'</div>';
    }

    public static function route(string $name, array $parameters = []): ?string
    {
        return Route::has($name) ? route($name, $parameters) : null;
    }

    public static function timeToRead(string $text): string
    {
        $minutes = round(str_word_count($text)/200);

        return $minutes > 0
            ? __(":minutes Min. Lesedauer", compact('minutes'))
            : 'Lesedauer weniger 1 Min.';
    }

    public static function truncate(string $text, int $length = 50, string $suffix = '...'): string
    {
        $words = explode(' ', $text);

        return count($words) >= $length
            ? implode(' ', array_slice($words, 0, 50)) . " $suffix "
            : $text;
    }
}
