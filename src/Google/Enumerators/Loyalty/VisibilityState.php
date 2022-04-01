<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Loyalty;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class VisibilityState implements LegacyValueEnumerator
{
    /** @var string */
    public const STATE_UNSPECIFIED = 'STATE_UNSPECIFIED';

    /** @var string */
    public const TRUSTED_TESTERS = 'TRUSTED_TESTERS';

    /** @var string */
    public const LIVE = 'LIVE';

    /** @var string */
    public const DISABLED = 'DISABLED';

    public static function values(): array
    {
        return [self::STATE_UNSPECIFIED, self::TRUSTED_TESTERS, self::LIVE, self::DISABLED];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'trustedTesters',
            'live',
            'disabled',
        ], [self::TRUSTED_TESTERS, self::LIVE, self::DISABLED], $value);
    }
}
