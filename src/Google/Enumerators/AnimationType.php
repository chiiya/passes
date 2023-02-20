<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

final class AnimationType
{
    /** @var string */
    public const ANIMATION_UNSPECIFIED = 'ANIMATION_UNSPECIFIED';

    /** @var string */
    public const FOIL_SHIMMER = 'FOIL_SHIMMER';

    public static function values(): array
    {
        return [self::ANIMATION_UNSPECIFIED, self::FOIL_SHIMMER];
    }
}
