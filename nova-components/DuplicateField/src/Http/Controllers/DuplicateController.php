<?php

namespace Acme\DuplicateField\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DuplicateController extends Controller
{
    private array $relationToMethodMap = [
        MorphToMany::class => 'replicateRelationManyToMany',
    ];

    public function duplicate(Request $request): array
    {
        $model = $request->model::where('id', $request->id)->first();

        if (\is_null($model)) {
            return [
                'status' => 404,
                'message' => 'No model found.',
                'destination' => config('nova.url') . config('nova.path') . '/resources/' . $request->resource . '/',
            ];
        }

        $replica = $model->replicate();

        $override = $request->override ?? [];

        foreach ($override as $attribute => $value) {
            $replica->{$attribute} = $value;
        }

        $relations = $request->relations ?? [];

        $model->load($relations);

        $replica->push();

        $replica->load($relations);

        foreach ($relations as $relation) {
            $method = $this->relationToMethodMap[self::relationshipType($model, $relation)] ?? null;

            if (\is_null($method)) {
                $replica = $this->replicateRelation($model, $replica, $relation);

                continue;
            }

            $replica = $this->{$method}($model, $replica, $relation);
        }

        return [
            'status' => 200,
            'message' => 'Done',
            'destination' => url(config('nova.path') . '/resources/' . $request->resource . '/' . $replica->id . '/edit')
        ];
    }

    private function replicateRelation(Model $model, Model $replica, string $relation): Model
    {
        // @todo implement ...

        return $replica;
    }

    private function replicateRelationManyToMany(Model $model, Model $replica, string $relation): Model
    {
        $items = $model->{$relation};

        $replica->{$relation}()->sync($items->pluck($items[0]->getKeyName()));

        return $replica;
    }

    private static function relationshipType($object, $method): string
    {
        return \get_class($object->{$method}());
    }
}
