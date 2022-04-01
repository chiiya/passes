<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class SeatLabel implements LegacyValueEnumerator
{
    /** @var string */
    public const SEAT_LABEL_UNSPECIFIED = 'SEAT_LABEL_UNSPECIFIED';

    /** @var string */
    public const SEAT = 'SEAT';

    public static function values(): array
    {
        return [self::SEAT_LABEL_UNSPECIFIED, self::SEAT];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['seat'], [self::SEAT], $value);
    }
}
