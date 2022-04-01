<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Loyalty;

final class SharedDataType
{
    /** @var string */
    public const SHARED_DATA_TYPE_UNSPECIFIED = 'SHARED_DATA_TYPE_UNSPECIFIED';

    /** @var string */
    public const FIRST_NAME = 'FIRST_NAME';

    /** @var string */
    public const LAST_NAME = 'LAST_NAME';

    /** @var string */
    public const STREET_ADDRESS = 'STREET_ADDRESS';

    /** @var string */
    public const ADDRESS_LINE_1 = 'ADDRESS_LINE_1';

    /** @var string */
    public const ADDRESS_LINE_2 = 'ADDRESS_LINE_2';

    /** @var string */
    public const ADDRESS_LINE_3 = 'ADDRESS_LINE_3';

    /** @var string */
    public const CITY = 'CITY';

    /** @var string */
    public const STATE = 'STATE';

    /** @var string */
    public const ZIPCODE = 'ZIPCODE';

    /** @var string */
    public const COUNTRY = 'COUNTRY';

    /** @var string */
    public const EMAIL = 'EMAIL';

    /** @var string */
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
