<?php

namespace App\Http\Controllers;

use App\Contracts\SiteServiceContract;
use App\Models\Route;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

final class PageController extends Controller
{
    public function index(SiteServiceContract $service, Request $request, Route $route): View|string
    {
        return __CLASS__;
//        $contentView = $route->present()
//            ->resolveAction()
//            ->resolveContentViewControllerAction()
//            ->load('contentBlocks');
//
//        $sections = [];
//
//        foreach ($contentView->sections as $section) {
//            $sections[$section['attributes']['name']][] = $section['layout'] === 'markdown'
//                ? $service->parsers()::markdownParser()->parse($section['attributes']['value'], $request)
//                : self::handleLayout($section['attributes']['value'], $contentView->contentBlocks);
//        }
//
//        $data = ['cacheKey' => __CLASS__.'@'.$contentView->id];
//
//        $mergeData = collect($sections)
//            ->mapWithKeys(fn (array $section, string $key) => [$key => implode('', $section)])
//            ->toArray();
//
//        return view('content-view', $data, $mergeData);
    }

    private static function handleLayout(string $layout, Collection $contentBlocks): string
    {
        $blocks = [];

        foreach ($contentBlocks as $contentBlock) {
            $blocks[] = $contentBlock->present()->render();

            $layout = str_replace("%$contentBlock->slug%", end($blocks), $layout);
        }

        return str_replace('%blocks%', implode('', $blocks), $layout);
    }
}
