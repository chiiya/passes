<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests;

class ArrayHelper
{
    public static function sort(mixed $array): mixed
    {
        if (is_array($array)) {
            ksort($array);

            foreach ($array as $key => $value) {
                $array[$key] = self::sort($value);
            }
        }

        return $array;
    }
}
