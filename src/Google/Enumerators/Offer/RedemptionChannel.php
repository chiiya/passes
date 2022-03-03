<?php

namespace Chiiya\Passes\Google\Enumerators\Offer;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class RedemptionChannel implements LegacyValueEnumerator
{
    public const REDEMPTION_CHANNEL_UNSPECIFIED = 'REDEMPTION_CHANNEL_UNSPECIFIED';

    public const INSTORE = 'INSTORE';

    public const ONLINE = 'ONLINE';

    public const BOTH = 'BOTH';

    public const TEMPORARY_PRICE_REDUCTION = 'TEMPORARY_PRICE_REDUCTION';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'instore',
            'online',
            'both',
            'temporaryPriceReduction',
        ], [self::INSTORE, self::ONLINE, self::BOTH, self::TEMPORARY_PRICE_REDUCTION], $value);
    }

    public static function values(): array
    {
        return [
            self::REDEMPTION_CHANNEL_UNSPECIFIED,
            self::INSTORE,
            self::ONLINE,
            self::BOTH,
            self::TEMPORARY_PRICE_REDUCTION,
        ];
    }
}
