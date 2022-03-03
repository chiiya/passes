<?php

namespace Chiiya\Passes\Google\Enumerators\Loyalty;

final class SharedDataType
{
    public const SHARED_DATA_TYPE_UNSPECIFIED = 'SHARED_DATA_TYPE_UNSPECIFIED';

    public const FIRST_NAME = 'FIRST_NAME';

    public const LAST_NAME = 'LAST_NAME';

    public const STREET_ADDRESS = 'STREET_ADDRESS';

    public const ADDRESS_LINE_1 = 'ADDRESS_LINE_1';

    public const ADDRESS_LINE_2 = 'ADDRESS_LINE_2';

    public const ADDRESS_LINE_3 = 'ADDRESS_LINE_3';

    public const CITY = 'CITY';

    public const STATE = 'STATE';

    public const ZIPCODE = 'ZIPCODE';

    public const COUNTRY = 'COUNTRY';

    public const EMAIL = 'EMAIL';

    public const PHONE = 'PHONE';

    public static function values(): array
    {
        return [
            self::SHARED_DATA_TYPE_UNSPECIFIED,
            self::FIRST_NAME,
            self::LAST_NAME,
            self::STREET_ADDRESS,
            self::ADDRESS_LINE_1,
            self::ADDRESS_LINE_2,
            self::ADDRESS_LINE_3,
            self::CITY,
            self::STATE,
            self::ZIPCODE,
            self::COUNTRY,
            self::EMAIL,
            self::PHONE,
        ];
    }
}
