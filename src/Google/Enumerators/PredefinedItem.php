<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class PredefinedItem implements LegacyValueEnumerator
{
    public const PREDEFINED_ITEM_UNSPECIFIED = 'PREDEFINED_ITEM_UNSPECIFIED';

    public const FREQUENT_FLYER_PROGRAM_NAME_AND_NUMBER = 'FREQUENT_FLYER_PROGRAM_NAME_AND_NUMBER';

    public const FLIGHT_NUMBER_AND_OPERATING_FLIGHT_NUMBER = 'FLIGHT_NUMBER_AND_OPERATING_FLIGHT_NUMBER';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['frequentFlyerProgramNameAndNumber', 'flightNumberAndOperatingFlightNumber'], [
            self::FREQUENT_FLYER_PROGRAM_NAME_AND_NUMBER,
            self::FLIGHT_NUMBER_AND_OPERATING_FLIGHT_NUMBER,
        ], $value);
    }

    public static function values(): array
    {
        return [
            self::PREDEFINED_ITEM_UNSPECIFIED,
            self::FREQUENT_FLYER_PROGRAM_NAME_AND_NUMBER,
            self::FLIGHT_NUMBER_AND_OPERATING_FLIGHT_NUMBER,
        ];
    }
}
