<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Offer;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class RedemptionChannel implements LegacyValueEnumerator
{
    /** @var string */
    public const REDEMPTION_CHANNEL_UNSPECIFIED = 'REDEMPTION_CHANNEL_UNSPECIFIED';

    /** @var string */
    public const INSTORE = 'INSTORE';

    /** @var string */
    public const ONLINE = 'ONLINE';

    /** @var string */
    public const BOTH = 'BOTH';

    /** @var string */
    public const TEMPORARY_PRICE_REDUCTION = 'TEMPORARY_PRICE_REDUCTION';

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

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'instore',
            'online',
            'both',
            'temporaryPriceReduction',
        ], [self::INSTORE, self::ONLINE, self::BOTH, self::TEMPORARY_PRICE_REDUCTION], $value);
    }
}
