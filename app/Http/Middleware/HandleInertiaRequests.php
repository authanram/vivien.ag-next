<?php

namespace App\Http\Middleware;

use App\Models\ImageCoordinates;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /** @return array<string, mixed> */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'sidebarOpen' => ! $request->hasCookie('sidebar_state') || $request->cookie('sidebar_state') === 'true',
            'imageStrip' => $this->getImageStripData(),
            'quote' => $this->getRandomQuote(),
            'flash' => [
                'success' => $request->session()->get('success'),
                'error' => $request->session()->get('error'),
            ],
        ];
    }

    /** @return array<string, mixed>|null */
    private function getRandomQuote(): ?array
    {
        $quote = Quote::query()->with('quoteAuthor')->inRandomOrder()->first();
        if (! $quote) {
            return [
                'body' => 'Um zur Wahrheit zu gelangen, %s sollte jeder die Meinung seines Gegners zu verteidigen versuchen.',
                'author_name' => 'Jean Paul',
                'author_occupation' => 'deutscher Schriftsteller',
                'author_url' => 'https://de.wikipedia.org/wiki/Jean_Paul',
            ];
        }

        return [
            'body' => $quote->body,
            'author_name' => $quote->quoteAuthor?->name,
            'author_occupation' => $quote->quoteAuthor?->occupation,
            'author_url' => $quote->quoteAuthor?->url,
        ];
    }

    /** @return array<int, array<string, mixed>> */
    private function getImageStripData(): array
    {
        return Cache::remember('image_strip_data', now()->addHour(), function () {
            return ImageCoordinates::query()
                ->where('active', true)
                ->with('image.media')
                ->orderBy('order_column')
                ->get()
                ->map(fn (ImageCoordinates $ic) => [
                    'top' => $ic->top,
                    'left' => $ic->left,
                    'height' => $ic->height,
                    'rotate' => $ic->rotate,
                    'rotate_x' => $ic->rotate_x,
                    'rotate_y' => $ic->rotate_y,
                    'perspective' => $ic->perspective,
                    'zindex' => $ic->zindex,
                    'position' => $ic->position,
                    'url' => $ic->image?->getFirstMediaUrl('image') ?? '',
                    'thumb_url' => $ic->image?->getFirstMediaUrl('image', 'thumb') ?: $ic->image?->getFirstMediaUrl('image') ?? '',
                ])
                ->filter(fn (array $item) => $item['url'] !== '')
                ->values()
                ->all();
        });
    }
}
