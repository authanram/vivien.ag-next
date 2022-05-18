<?php

namespace App\Nova;

use Laravel\Nova\Fields\Field;

trait SupportsDependsOn
{
    private static function dependsOnType(Field $field, string $dependsOn, string $value): Field
    {
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return $field->dependsOn(
            $dependsOn,
            fn ($field, $request, $formData) => $formData->type === $value
                ? $field->show()
                : $field->hide(),
        );
    }
}
