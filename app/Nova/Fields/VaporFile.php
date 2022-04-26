<?php

namespace App\Nova\Fields;

class VaporFile extends \Laravel\Nova\Fields\VaporFile
{
    protected function prepareStorageCallback($storageCallback)
    {
        $this->storageCallback = $storageCallback ?? function ($request, $model, $attribute, $requestAttribute) {
                if ($request->{$requestAttribute} === false) {
                    return $this->attribute = $model->{$attribute};
                }

                return $this->mergeExtraStorageColumns($request, [
                    $this->attribute => $this->storeFile($request, $requestAttribute),
                ]);
            };
    }
}
