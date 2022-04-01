<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TicketStatus implements LegacyValueEnumerator
{
    /** @var string */
    public const TICKET_STATUS_UNSPECIFIED = 'TICKET_STATUS_UNSPECIFIED';

    /** @var string */
    public const USED = 'USED';

    /** @var string */
    public const REFUNDED = 'REFUNDED';

    /** @var string */
    public const EXCHANGED = 'EXCHANGED';

    public static function values(): array
    {
        return [self::TICKET_STATUS_UNSPECIFIED, self::USED, self::REFUNDED, self::EXCHANGED];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'used',
            'refunded',
            'exchanged',
        ], [self::USED, self::REFUNDED, self::EXCHANGED], $value);
    }
}
