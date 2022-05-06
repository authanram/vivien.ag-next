<?php

namespace App\Concerns;

use App\Models\Content as Model;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use JsonException;
use stdClass;

trait HasCookieConsent
{
    public function cookieConsent(string $key = null): mixed
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

    public function content(string $slug, bool $markdown = false, array $replace = []): stdClass
    {
        try {
            /** @noinspection PhpStaticAsDynamicMethodCallInspection */
            $content = Model::where('slug', $slug)->firstOrFail();
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }

//        $body = $markdown
//            ? $this->markdown($content->body, $replace)
//            : $content->body;

        $body = $content->body;

        $map = config('project.content.replace')();

        foreach ($map as $key => $value) {
            $body = str_replace($key, $value, $body);
        }

        return (object) [
            'body' => $body,
            'slug' => $content->getAttribute('slug'),
        ];
    }
}
