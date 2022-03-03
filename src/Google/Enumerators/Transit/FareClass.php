<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class FareClass implements LegacyValueEnumerator
{
    public const FARE_CLASS_UNSPECIFIED = 'FARE_CLASS_UNSPECIFIED';

    public const ECONOMY = 'ECONOMY';

    public const FIRST = 'FIRST';

    public const BUSINESS = 'BUSINESS';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['economy', 'first', 'business'], [self::ECONOMY, self::FIRST, self::BUSINESS], $value);
    }

    public static function values(): array
    {
        return [self::FARE_CLASS_UNSPECIFIED, self::ECONOMY, self::FIRST, self::BUSINESS];
    }
}
