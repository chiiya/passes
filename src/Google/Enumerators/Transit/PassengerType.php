<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class PassengerType implements LegacyValueEnumerator
{
    public const PASSENGER_TYPE_UNSPECIFIED = 'PASSENGER_TYPE_UNSPECIFIED';

    public const SINGLE_PASSENGER = 'SINGLE_PASSENGER';

    public const MULTIPLE_PASSENGERS = 'MULTIPLE_PASSENGERS';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'singlePassenger',
            'multiplePassengers',
        ], [self::SINGLE_PASSENGER, self::MULTIPLE_PASSENGERS], $value);
    }

    public static function values(): array
    {
        return [self::PASSENGER_TYPE_UNSPECIFIED, self::SINGLE_PASSENGER, self::MULTIPLE_PASSENGERS];
    }
}
