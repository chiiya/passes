<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TransitOption implements LegacyValueEnumerator
{
    public const TRANSIT_OPTION_UNSPECIFIED = 'TRANSIT_OPTION_UNSPECIFIED';

    public const ORIGIN_AND_DESTINATION_NAMES = 'ORIGIN_AND_DESTINATION_NAMES';

    public const ORIGIN_AND_DESTINATION_CODES = 'ORIGIN_AND_DESTINATION_CODES';

    public const ORIGIN_NAME = 'ORIGIN_NAME';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'originAndDestinationNames',
            'originAndDestinationCodes',
            'originName',
        ], [self::ORIGIN_AND_DESTINATION_NAMES, self::ORIGIN_AND_DESTINATION_CODES, self::ORIGIN_NAME], $value);
    }

    public static function values(): array
    {
        return [
            self::TRANSIT_OPTION_UNSPECIFIED,
            self::ORIGIN_AND_DESTINATION_NAMES,
            self::ORIGIN_AND_DESTINATION_CODES,
            self::ORIGIN_NAME,
        ];
    }
}
