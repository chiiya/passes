<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class DoorsOpenLabel implements LegacyValueEnumerator
{
    /** @var string */
    public const DOORS_OPEN_LABEL_UNSPECIFIED = 'DOORS_OPEN_LABEL_UNSPECIFIED';

    /** @var string */
    public const DOORS_OPEN = 'DOORS_OPEN';

    /** @var string */
    public const GATES_OPEN = 'GATES_OPEN';

    public static function values(): array
    {
        return [self::DOORS_OPEN_LABEL_UNSPECIFIED, self::DOORS_OPEN, self::GATES_OPEN];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['doorsOpen', 'gatesOpen'], [self::DOORS_OPEN, self::GATES_OPEN], $value);
    }
}
