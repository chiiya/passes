<?php

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BoardingDoor implements LegacyValueEnumerator
{
    public const BOARDING_DOOR_UNSPECIFIED = 'BOARDING_DOOR_UNSPECIFIED';

    public const FRONT = 'FRONT';

    public const BACK = 'BACK';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['front', 'back'], [self::FRONT, self::BACK], $value);
    }

    public static function values(): array
    {
        return [self::BOARDING_DOOR_UNSPECIFIED, self::FRONT, self::BACK];
    }
}
