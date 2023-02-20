<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

final class TotpAlgorithm
{
    /** @var string */
    public const TOTP_ALGORITHM_UNSPECIFIED = 'TOTP_ALGORITHM_UNSPECIFIED';

    /**
     * @var string
     *             TOTP algorithm from RFC 6238 with the SHA1 hash function
     */
    public const TOTP_SHA1 = 'TOTP_SHA1';

    public static function values(): array
    {
        return [self::TOTP_ALGORITHM_UNSPECIFIED, self::TOTP_SHA1];
    }
}
