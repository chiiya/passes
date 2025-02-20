<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TripType implements LegacyValueEnumerator
{
    /** @var string */
    public const TRIP_TYPE_UNSPECIFIED = 'TRIP_TYPE_UNSPECIFIED';

    /** @var string */
    public const ROUND_TRIP = 'ROUND_TRIP';

    /** @var string */
    public const ONE_WAY = 'ONE_WAY';

    public static function values(): array
    {
        return [self::TRIP_TYPE_UNSPECIFIED, self::ROUND_TRIP, self::ONE_WAY];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'roundTrip' => self::ROUND_TRIP,
            'oneWay' => self::ONE_WAY,
            default => $value,
        };
    }
}
