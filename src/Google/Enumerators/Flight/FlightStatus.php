<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class FlightStatus implements LegacyValueEnumerator
{
    /** @var string */
    public const FLIGHT_STATUS_UNSPECIFIED = 'FLIGHT_STATUS_UNSPECIFIED';

    /** @var string */
    public const SCHEDULED = 'SCHEDULED';

    /** @var string */
    public const ACTIVE = 'ACTIVE';

    /** @var string */
    public const LANDED = 'LANDED';

    /** @var string */
    public const CANCELLED = 'CANCELLED';

    /** @var string */
    public const REDIRECTED = 'REDIRECTED';

    /** @var string */
    public const DIVERTED = 'DIVERTED';

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
}
