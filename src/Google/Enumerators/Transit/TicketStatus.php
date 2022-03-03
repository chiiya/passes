<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class TicketStatus implements LegacyValueEnumerator
{
    public const TICKET_STATUS_UNSPECIFIED = 'TICKET_STATUS_UNSPECIFIED';

    public const USED = 'USED';

    public const REFUNDED = 'REFUNDED';

    public const EXCHANGED = 'EXCHANGED';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'used',
            'refunded',
            'exchanged',
        ], [self::USED, self::REFUNDED, self::EXCHANGED], $value);
    }

    public static function values(): array
    {
        return [self::TICKET_STATUS_UNSPECIFIED, self::USED, self::REFUNDED, self::EXCHANGED];
    }
}
