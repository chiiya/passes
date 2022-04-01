<?php declare(strict_types=1);

namespace Chiiya\Passes\Common;

use JsonSerializable;
use Spatie\DataTransferObject\DataTransferObject;

abstract class Component extends DataTransferObject implements JsonSerializable
{
    /**
     * Convert the object into something JSON serializable.
     */
    final public function jsonSerialize(): array
    {
        return $this->removeEmptyValues($this->toArray());
    }

    /**
     * Remove null values and empty arrays from an array.
     */
    protected function removeEmptyValues(array $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->removeEmptyValues($value);
            }

            if ($array[$key] === null || (is_array($array[$key]) && count($array[$key]) === 0)) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
