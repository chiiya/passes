<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

final class BarcodeRenderEncoding
{
    /** @var string */
    public const RENDER_ENCODING_UNSPECIFIED = 'RENDER_ENCODING_UNSPECIFIED';

    /** @var string */
    public const UTF_8 = 'UTF_8';

    public static function values(): array
    {
        return [self::RENDER_ENCODING_UNSPECIFIED, self::UTF_8];
    }
}
