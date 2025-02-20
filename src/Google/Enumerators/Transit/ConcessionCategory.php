<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ConcessionCategory implements LegacyValueEnumerator
{
    /** @var string */
    public const CONCESSION_CATEGORY_UNSPECIFIED = 'CONCESSION_CATEGORY_UNSPECIFIED';

    /** @var string */
    public const ADULT = 'ADULT';

    /** @var string */
    public const CHILD = 'CHILD';

    /** @var string */
    public const SENIOR = 'SENIOR';

    public static function values(): array
    {
        return [self::CONCESSION_CATEGORY_UNSPECIFIED, self::ADULT, self::CHILD, self::SENIOR];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'adult' => self::ADULT,
            'child' => self::CHILD,
            'senior' => self::SENIOR,
            default => $value,
        };
    }
}
