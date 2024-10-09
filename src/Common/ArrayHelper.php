<?php declare(strict_types=1);

namespace Chiiya\Passes\Common;

use Antwerpes\DataTransferObject\Arr;

class ArrayHelper
{
    /**
     * Get all the given array except for a specified array of keys.
     */
    public static function except(array $array, array $keys): array
    {
        static::forget($array, $keys);

        return $array;
    }

    /**
     * Get a subset of the items from the given array.
     */
    public static function only(array $array, array $keys): array
    {
        return array_intersect_key($array, array_flip($keys));
    }

    /**
     * Remove one or many array items from a given array using "dot" notation.
     */
    public static function forget(array &$array, array $keys): void
    {
        $original = &$array;

        if (count($keys) === 0) {
            return;
        }

        foreach ($keys as $key) {
            // if the exact key exists in the top-level, remove it
            if (Arr::exists($array, $key)) {
                unset($array[$key]);

                continue;
            }

            $parts = explode('.', $key);

            // clean up before each pass
            $array = &$original;

            while (count($parts) > 1) {
                $part = array_shift($parts);

                if (isset($array[$part]) && Arr::accessible($array[$part])) {
                    $array = &$array[$part];
                } else {
                    continue 2;
                }
            }

            unset($array[array_shift($parts)]);
        }
    }
}
