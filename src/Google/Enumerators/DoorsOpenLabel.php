<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class DoorsOpenLabel implements LegacyValueEnumerator
{
    public const DOORS_OPEN_LABEL_UNSPECIFIED = 'DOORS_OPEN_LABEL_UNSPECIFIED';

    public const DOORS_OPEN = 'DOORS_OPEN';

    public const GATES_OPEN = 'GATES_OPEN';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['doorsOpen', 'gatesOpen'], [self::DOORS_OPEN, self::GATES_OPEN], $value);
    }

    public static function values(): array
    {
        return [self::DOORS_OPEN_LABEL_UNSPECIFIED, self::DOORS_OPEN, self::GATES_OPEN];
    }
}
