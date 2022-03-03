<?php

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ConfirmationCodeLabel implements LegacyValueEnumerator
{
    public const CONFIRMATION_CODE_LABEL_UNSPECIFIED = 'CONFIRMATION_CODE_LABEL_UNSPECIFIED';

    public const CONFIRMATION_CODE = 'CONFIRMATION_CODE';

    public const CONFIRMATION_NUMBER = 'CONFIRMATION_NUMBER';

    public const ORDER_NUMBER = 'ORDER_NUMBER';

    public const RESERVATION_NUMBER = 'RESERVATION_NUMBER';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['confirmationCode', 'confirmationNumber', 'orderNumber', 'reservationNumber'], [
            self::CONFIRMATION_CODE,
            self::CONFIRMATION_NUMBER,
            self::ORDER_NUMBER,
            self::RESERVATION_NUMBER,
        ], $value);
    }

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
}
