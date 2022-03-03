<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TransitType implements LegacyValueEnumerator
{
    public const TRANSIT_TYPE_UNSPECIFIED = 'TRANSIT_TYPE_UNSPECIFIED';

    public const BUS = 'BUS';

    public const RAIL = 'RAIL';

    public const TRAM = 'TRAM';

    public const FERRY = 'FERRY';

    public const OTHER = 'OTHER';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'bus',
            'rail',
            'tram',
            'ferry',
            'other',
        ], [self::BUS, self::RAIL, self::TRAM, self::FERRY, self::OTHER], $value);
    }

    public static function values(): array
    {
        return [self::TRANSIT_TYPE_UNSPECIFIED, self::BUS, self::RAIL, self::TRAM, self::FERRY, self::OTHER];
    }
}
