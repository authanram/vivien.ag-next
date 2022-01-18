<?php

namespace App\Nova\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

abstract class DuplicateResource extends Action
{
    use SerializesModels;

    public $attributes = [];
    public $showOnIndex = false;
    public $showOnTableRow = true;
    public $confirmButtonText = 'Duplicate';
    public $confirmText = 'Are you sure you want to duplicate this resource?';
    public $withoutActionEvents = true;

    protected $keepRelations = [];
    protected $duplicateRelations = [];

    /**
     * @noinspection PhpMissingReturnTypeInspection
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    final public function handle(ActionFields $fields, Collection $models)
    {
        if ($models->count() !== 1) {
            return Action::danger('Cannot duplicate multiple models simultaneously.');
        }

        $model = $models->first();

        $newModel = $model->replicate();

        foreach ($fields->getAttributes() as $key => $value) {
            if(isset($value)){
                $newModel->{$key} = $value;
            }
        }

        foreach (static::getAttributes() as $key => $value) {
            $newModel->{$key} = $value;
        }

        $newModel->push();

        if (!empty($this->duplicateRelations)) {
            $model->load($this->duplicateRelations);

            foreach ($model->getRelations() as $relation => $items) {
                foreach ($items as $item) {
                    unset($item->id);
                    $item->setAppends([]);
                    $newModel->{$relation}()->create($item->toArray());
                }
            }
        }

        if (!empty($this->keepRelations)) {
            unset($model->relations);
            $model->load($this->keepRelations);

            foreach ($model->getRelations() as $relation => $items) {
                foreach ($items as $item) {
                    $newModel->{$relation}()->attach($item);
                }
            }
        }

        $newModel->save();

        return Action::message($this->getSuccessMessage($model, $newModel, $fields));
    }

    public function text(string $text): static
    {
        $this->name = $text;

        return $this;
    }

    /** @noinspection PhpUnusedParameterInspection */
    final protected function getSuccessMessage(
        Model $originalModel,
        Model $newModel,
        ActionFields $fields
    ): string {
        return 'Resource has been duplicated.';
    }

    public static function getAttributes(): array
    {
        return [];
    }
}
