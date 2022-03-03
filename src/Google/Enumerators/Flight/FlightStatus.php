<?php

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class FlightStatus implements LegacyValueEnumerator
{
    public const FLIGHT_STATUS_UNSPECIFIED = 'FLIGHT_STATUS_UNSPECIFIED';

    public const SCHEDULED = 'SCHEDULED';

    public const ACTIVE = 'ACTIVE';

    public const LANDED = 'LANDED';

    public const CANCELLED = 'CANCELLED';

    public const REDIRECTED = 'REDIRECTED';

    public const DIVERTED = 'DIVERTED';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['scheduled', 'active', 'landed', 'cancelled', 'redirected', 'diverted'], [
            self::SCHEDULED,
            self::ACTIVE,
            self::LANDED,
            self::CANCELLED,
            self::REDIRECTED,
            self::DIVERTED,
        ], $value);
    }

    public static function values(): array
    {
        return [
            self::FLIGHT_STATUS_UNSPECIFIED,
            self::SCHEDULED,
            self::ACTIVE,
            self::LANDED,
            self::CANCELLED,
            self::REDIRECTED,
            self::DIVERTED,
        ];
    }
}
