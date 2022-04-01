<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ConfirmationCodeLabel implements LegacyValueEnumerator
{
    /** @var string */
    public const CONFIRMATION_CODE_LABEL_UNSPECIFIED = 'CONFIRMATION_CODE_LABEL_UNSPECIFIED';

    /** @var string */
    public const CONFIRMATION_CODE = 'CONFIRMATION_CODE';

    /** @var string */
    public const CONFIRMATION_NUMBER = 'CONFIRMATION_NUMBER';

    /** @var string */
    public const ORDER_NUMBER = 'ORDER_NUMBER';

    /** @var string */
    public const RESERVATION_NUMBER = 'RESERVATION_NUMBER';

    public static function values(): array
    {
        return [
            self::CONFIRMATION_CODE_LABEL_UNSPECIFIED,
            self::CONFIRMATION_CODE,
            self::CONFIRMATION_NUMBER,
            self::ORDER_NUMBER,
            self::RESERVATION_NUMBER,
        ];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['confirmationCode', 'confirmationNumber', 'orderNumber', 'reservationNumber'], [
            self::CONFIRMATION_CODE,
            self::CONFIRMATION_NUMBER,
            self::ORDER_NUMBER,
            self::RESERVATION_NUMBER,
        ], $value);
    }
}
