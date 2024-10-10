<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BarcodeRenderEncoding implements LegacyValueEnumerator
{
    /** @var string */
    public const RENDER_ENCODING_UNSPECIFIED = 'RENDER_ENCODING_UNSPECIFIED';

    /** @var string */
    public const UTF_8 = 'utf8';

    public static function values(): array
    {
        return [self::RENDER_ENCODING_UNSPECIFIED, self::UTF_8];
    }

    public static function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'UTF_8' => self::UTF_8,
            default => $value,
        };
    }
}
