<?php

namespace Chiiya\Passes\Google\Enumerators\Loyalty;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class VisibilityState implements LegacyValueEnumerator
{
    public const STATE_UNSPECIFIED = 'STATE_UNSPECIFIED';

    public const TRUSTED_TESTERS = 'TRUSTED_TESTERS';

    public const LIVE = 'LIVE';

    public const DISABLED = 'DISABLED';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'trustedTesters',
            'live',
            'disabled',
        ], [self::TRUSTED_TESTERS, self::LIVE, self::DISABLED], $value);
    }

    public static function values(): array
    {
        return [self::STATE_UNSPECIFIED, self::TRUSTED_TESTERS, self::LIVE, self::DISABLED];
    }
}
