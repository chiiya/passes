<?php

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class RowLabel implements LegacyValueEnumerator
{
    public const ROW_LABEL_UNSPECIFIED = 'ROW_LABEL_UNSPECIFIED';

    public const ROW = 'ROW';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['row'], [self::ROW], $value);
    }

    public static function values(): array
    {
        return [self::ROW_LABEL_UNSPECIFIED, self::ROW];
    }
}
