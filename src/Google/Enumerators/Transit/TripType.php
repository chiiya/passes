<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TripType implements LegacyValueEnumerator
{
    public const TRIP_TYPE_UNSPECIFIED = 'TRIP_TYPE_UNSPECIFIED';

    public const ROUND_TRIP = 'ROUND_TRIP';

    public const ONE_WAY = 'ONE_WAY';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['roundTrip', 'oneWay'], [self::ROUND_TRIP, self::ONE_WAY], $value);
    }

    public static function values(): array
    {
        return [self::TRIP_TYPE_UNSPECIFIED, self::ROUND_TRIP, self::ONE_WAY];
    }
}
