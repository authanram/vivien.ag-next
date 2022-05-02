<?php

namespace App\Presenters\Models;

use App\Models\StaffProfile;
use App\Presenters\Presenter;
use Illuminate\Support\Collection;

/**
 * @property StaffProfile $entity
 */
class StaffProfilePresenter extends Presenter
{
    public static function toOptionArrayValues(Collection $staffProfiles): array
    {
        $isSelected = static function ($model, $staffProfiles) {
            return $model->is_selected || $staffProfiles->pluck('id')->contains($model->id);
        };

        return StaffProfile::notDisabled()
            ->get()
            ->merge($staffProfiles)
            ->mapWithKeys(fn (StaffProfile $model) => [$model->name => $isSelected($model, $staffProfiles)])
            ->toArray();
    }

    public static function toOptionArrayOptions(): array
    {
        return StaffProfile::whereNull('disabled_at')
            ->pluck('name')
            ->values()
            ->toArray();
    }

    public function disabledAt(): ?string
    {
        return $this->dateFormat('disabled_at');
    }
}
