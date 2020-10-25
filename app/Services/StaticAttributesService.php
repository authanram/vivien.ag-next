<?php /** @noinspection MissingReturnTypeInspection */

namespace App\Services;

use App\Models\StaticAttribute as Model;
use App\Contracts\StaticAttributesServiceContract;
use Illuminate\Database\Eloquent\Collection;

final class StaticAttributesService implements StaticAttributesServiceContract
{
    protected Collection $attributes;

    /** @noinspection MissingParameterTypeDeclarationInspection */
    public function attribute(string $slug, $default = null)
    {
        try {

            $attribute = $this->get($slug);

        } catch (\Exception $e) {

            $attribute = null;

        }

        if (null === $attribute) {

            return null;

        }

        $value = $attribute->getAttribute('value');

        $data = static::toObject($attribute->getAttribute('data'));

        return $value ?? $data ?? $default;
    }

    public function get(string $slug, ?array $tags = null): ?Model
    {
        if (empty($this->attributes)) {
            $this->attributes = Model::all();
        }

        $fn = fn ($attribute) => $attribute->getAttribute('slug') === $slug;

        return $this->attributes->filter($fn)->first();
    }

    public static function toObject(array $array): \stdClass
    {
        $obj = new \stdClass;

        foreach ($array as $k => $v) {
            if ('' !== $k) {
                if (\is_array($v)) {
                    $obj->{$k} = static::toObject($v);
                } else {
                    $obj->{$k} = $v;
                }
            }
        }

        return $obj;
    }
}
