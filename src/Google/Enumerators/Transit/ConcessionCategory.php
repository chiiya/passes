<?php

namespace Chiiya\Passes\Google\Enumerators\Transit;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ConcessionCategory implements LegacyValueEnumerator
{
    public const CONCESSION_CATEGORY_UNSPECIFIED = 'CONCESSION_CATEGORY_UNSPECIFIED';

    public const ADULT = 'ADULT';

    public const CHILD = 'CHILD';

    public const SENIOR = 'SENIOR';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['adult', 'child', 'senior'], [self::ADULT, self::CHILD, self::SENIOR], $value);
    }

    public static function values(): array
    {
        return [self::CONCESSION_CATEGORY_UNSPECIFIED, self::ADULT, self::CHILD, self::SENIOR];
    }
}
