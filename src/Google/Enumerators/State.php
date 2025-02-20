<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class State implements LegacyValueEnumerator
{
    /** @var string */
    public const STATE_UNSPECIFIED = 'STATE_UNSPECIFIED';

    /** @var string */
    public const ACTIVE = 'ACTIVE';

    /** @var string */
    public const COMPLETED = 'COMPLETED';

    /** @var string */
    public const EXPIRED = 'EXPIRED';

    /** @var string */
    public const INACTIVE = 'INACTIVE';

    public static function values(): array
    {
        return [self::STATE_UNSPECIFIED, self::ACTIVE, self::COMPLETED, self::EXPIRED, self::INACTIVE];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'active' => self::ACTIVE,
            'completed' => self::COMPLETED,
            'expired' => self::EXPIRED,
            'inactive' => self::INACTIVE,
            default => $value,
        };
    }
}
