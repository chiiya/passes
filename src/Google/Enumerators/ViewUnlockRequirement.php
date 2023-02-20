<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

final class ViewUnlockRequirement
{
    /**
     * Default value, same as UNLOCK_NOT_REQUIRED.
     *
     * @var string
     */
    public const VIEW_UNLOCK_REQUIREMENT_UNSPECIFIED = 'VIEW_UNLOCK_REQUIREMENT_UNSPECIFIED';

    /**
     * Default behavior for all the existing Passes if ViewUnlockRequirement is not set.
     *
     * @var string
     */
    public const UNLOCK_NOT_REQUIRED = 'UNLOCK_NOT_REQUIRED';

    /**
     * Requires the user to unlock their device each time the pass is viewed.
     * If the user removes their device lock after saving the pass, then they will be prompted
     * to create a device lock before the pass can be viewed.
     *
     * @var string
     */
    public const UNLOCK_REQUIRED_TO_VIEW = 'UNLOCK_REQUIRED_TO_VIEW';

    public static function values(): array
    {
        return [
            self::VIEW_UNLOCK_REQUIREMENT_UNSPECIFIED,
            self::UNLOCK_NOT_REQUIRED,
            self::UNLOCK_REQUIRED_TO_VIEW,
        ];
    }
}
