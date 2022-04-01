<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class FareClass implements LegacyValueEnumerator
{
    /** @var string */
    public const FARE_CLASS_UNSPECIFIED = 'FARE_CLASS_UNSPECIFIED';

    /** @var string */
    public const ECONOMY = 'ECONOMY';

    /** @var string */
    public const FIRST = 'FIRST';

    /** @var string */
    public const BUSINESS = 'BUSINESS';

    public static function values(): array
    {
        return [self::FARE_CLASS_UNSPECIFIED, self::ECONOMY, self::FIRST, self::BUSINESS];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['economy', 'first', 'business'], [self::ECONOMY, self::FIRST, self::BUSINESS], $value);
    }
}
