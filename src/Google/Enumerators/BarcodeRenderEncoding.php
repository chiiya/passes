<?php

namespace Chiiya\Passes\Google\Enumerators;

final class BarcodeRenderEncoding
{
    public const RENDER_ENCODING_UNSPECIFIED = 'RENDER_ENCODING_UNSPECIFIED';

    public const UTF_8 = 'UTF_8';

    public static function values(): array
    {
        return [self::RENDER_ENCODING_UNSPECIFIED, self::UTF_8];
    }
}
