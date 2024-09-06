<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BoardingDoor implements LegacyValueEnumerator
{
    /** @var string */
    public const BOARDING_DOOR_UNSPECIFIED = 'BOARDING_DOOR_UNSPECIFIED';

    /** @var string */
    public const FRONT = 'FRONT';

    /** @var string */
    public const BACK = 'BACK';

    public static function values(): array
    {
        return [self::BOARDING_DOOR_UNSPECIFIED, self::FRONT, self::BACK];
    }

    public function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'front' => self::FRONT,
            'back' => self::BACK,
            default => $value,
        };
    }
}
