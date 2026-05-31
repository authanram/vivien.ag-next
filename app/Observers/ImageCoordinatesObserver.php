<?php

namespace App\Observers;

use App\Models\ImageCoordinates;
use Illuminate\Support\Facades\Cache;

class ImageCoordinatesObserver
{
    public function saved(ImageCoordinates $imageCoordinates): void
    {
        Cache::forget('image_strip_data');
    }

    public function deleted(ImageCoordinates $imageCoordinates): void
    {
        Cache::forget('image_strip_data');
    }

    public function restored(ImageCoordinates $imageCoordinates): void
    {
        Cache::forget('image_strip_data');
    }
}
