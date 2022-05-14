<?php

namespace App\Presenters;

use App\Models\Staff;
use Illuminate\Support\Collection;

/**
 * @property Staff $entity
 */
class StaffPresenter extends Presenter
{
    public static function toOptionArrayValues(Collection $staff): array
    {
        $isSelected = static function ($model, $staff) {
            return $model->is_selected || $staff->pluck('id')->contains($model->id);
        };

        return Staff::notDisabled()
            ->get()
            ->merge($staff)
            ->mapWithKeys(fn (Staff $model) => [$model->name => $isSelected($model, $staff)])
            ->toArray();
    }

    public static function toOptionArrayOptions(): array
    {
        return Staff::whereNull('disabled_at')
            ->pluck('name')
            ->values()
            ->toArray();
    }

    public function disabledAt(): ?string
    {
        return $this->dateFormat('disabled_at');
    }
}
