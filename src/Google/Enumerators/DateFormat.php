<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class DateFormat implements LegacyValueEnumerator
{
    /** @var string */
    public const DATE_FORMAT_UNSPECIFIED = 'DATE_FORMAT_UNSPECIFIED';

    /** @var string */
    public const DATE_TIME = 'DATE_TIME';

    /** @var string */
    public const DATE_ONLY = 'DATE_ONLY';

    /** @var string */
    public const TIME_ONLY = 'TIME_ONLY';

    /** @var string */
    public const DATE_TIME_YEAR = 'DATE_TIME_YEAR';

    /** @var string */
    public const DATE_YEAR = 'DATE_YEAR';

    public static function values(): array
    {
        return [
            self::DATE_FORMAT_UNSPECIFIED,
            self::DATE_TIME,
            self::DATE_ONLY,
            self::TIME_ONLY,
            self::DATE_TIME_YEAR,
            self::DATE_YEAR,
        ];
    }

    public function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'dateTime' => self::DATE_TIME,
            'dateOnly' => self::DATE_ONLY,
            'timeOnly' => self::TIME_ONLY,
            'dateTimeYear' => self::DATE_TIME_YEAR,
            'dateYear' => self::DATE_YEAR,
            default => $value,
        };
    }
}
