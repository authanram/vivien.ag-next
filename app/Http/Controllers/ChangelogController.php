<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ChangelogController extends Controller
{
    final public function index(Request $request): View
    {
        $changelog = '';

        $accent = accent();

        $files = static::getChangelog();

        $count = $files->count();

        $index = 0;

        foreach ($files as $file) {

            $date = Carbon::createFromTimeString($file['date'] . ' 00:00:00');

            $changelog .= sprintf(
                '<h2 class="font-bold text-%s-600 text-3xl" style="line-height:.75em">%s<br><small class="font-medium text-xs">%s</small></h2>',
                $accent,
                $date->format('d-m-Y'),
                $date->diffForHumans()
            );

            $changelog .= $file['view'];

            if ($index < $count - 1) {

                $changelog .= '<div class="py-5"></div>';

            }

            $index++;

        }

        return view('changelog.changelog', compact('changelog'));
    }

    private static function getChangelog(): Collection
    {
        $files = File::allFiles(resource_path('views/changelog'));

        return collect($files)
            ->map(static function (\SplFileInfo $file) {

                if (\in_array($file->getFilename(), [

                    'auth.blade.php',

                    'changelog.blade.php',

                ])) {

                    return null;

                }

                $date = Str::afterLast($file->getPath(), '/');

                $view = parsedown(view("changelog.$date.index"));

                $authViewPath = "changelog.$date.auth";

                if (ViewFacade::exists($authViewPath)) {

                    $view .= '<div class="mt-4 text-gray-500 tracking-wide text-xs">Visible for authenticated users only:</div>';

                    $view .= parsedown(view($authViewPath));

                }

                return compact('date', 'view');

            })

            ->filter()

            ->sortByDesc('date');
    }
}
