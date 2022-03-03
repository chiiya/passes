<?php

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class SectionLabel implements LegacyValueEnumerator
{
    public const SECTION_LABEL_UNSPECIFIED = 'SECTION_LABEL_UNSPECIFIED';

    public const SECTION = 'SECTION';

    public const THEATER = 'THEATER';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['section', 'theater'], [self::SECTION, self::THEATER], $value);
    }

    public static function values(): array
    {
        return [self::SECTION_LABEL_UNSPECIFIED, self::SECTION, self::THEATER];
    }
}
