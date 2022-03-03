<?php

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class SeatLabel implements LegacyValueEnumerator
{
    public const SEAT_LABEL_UNSPECIFIED = 'SEAT_LABEL_UNSPECIFIED';

    public const SEAT = 'SEAT';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['seat'], [self::SEAT], $value);
    }

    public static function values(): array
    {
        return [self::SEAT_LABEL_UNSPECIFIED, self::SEAT];
    }
}
