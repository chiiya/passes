<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class State implements LegacyValueEnumerator
{
    public const STATE_UNSPECIFIED = 'STATE_UNSPECIFIED';

    public const ACTIVE = 'ACTIVE';

    public const COMPLETED = 'COMPLETED';

    public const EXPIRED = 'EXPIRED';

    public const INACTIVE = 'INACTIVE';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'active',
            'completed',
            'expired',
            'inactive',
        ], [self::ACTIVE, self::COMPLETED, self::EXPIRED, self::INACTIVE], $value);
    }

    public static function values(): array
    {
        return [self::STATE_UNSPECIFIED, self::ACTIVE, self::COMPLETED, self::EXPIRED, self::INACTIVE];
    }
}
