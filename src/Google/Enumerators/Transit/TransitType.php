<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TransitType implements LegacyValueEnumerator
{
    /** @var string */
    public const TRANSIT_TYPE_UNSPECIFIED = 'TRANSIT_TYPE_UNSPECIFIED';

    /** @var string */
    public const BUS = 'BUS';

    /** @var string */
    public const RAIL = 'RAIL';

    /** @var string */
    public const TRAM = 'TRAM';

    /** @var string */
    public const FERRY = 'FERRY';

    /** @var string */
    public const OTHER = 'OTHER';

    public static function values(): array
    {
        return [self::TRANSIT_TYPE_UNSPECIFIED, self::BUS, self::RAIL, self::TRAM, self::FERRY, self::OTHER];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'bus' => self::BUS,
            'rail' => self::RAIL,
            'tram' => self::TRAM,
            'ferry' => self::FERRY,
            'other' => self::OTHER,
            default => $value,
        };
    }
}
