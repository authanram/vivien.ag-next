<?php

namespace App\Observers;

use App\Models\Image;
use Illuminate\Support\Facades\Cache;

class ImageObserver
{
    public function saved(Image $image): void
    {
        Cache::forget('image_strip_data');
    }

    public function deleted(Image $image): void
    {
        Cache::forget('image_strip_data');
    }

    public function restored(Image $image): void
    {
        Cache::forget('image_strip_data');
    }
}
