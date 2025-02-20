<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class SectionLabel implements LegacyValueEnumerator
{
    /** @var string */
    public const SECTION_LABEL_UNSPECIFIED = 'SECTION_LABEL_UNSPECIFIED';

    /** @var string */
    public const SECTION = 'SECTION';

    /** @var string */
    public const THEATER = 'THEATER';

    public static function values(): array
    {
        return [self::SECTION_LABEL_UNSPECIFIED, self::SECTION, self::THEATER];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'section' => self::SECTION,
            'theater' => self::THEATER,
            default => $value,
        };
    }
}
