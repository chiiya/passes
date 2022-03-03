<?php

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class GateLabel implements LegacyValueEnumerator
{
    public const GATE_LABEL_UNSPECIFIED = 'GATE_LABEL_UNSPECIFIED';

    public const GATE = 'GATE';

    public const DOOR = 'DOOR';

    public const ENTRANCE = 'ENTRANCE';

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['gate', 'door', 'entrance'], [self::GATE, self::DOOR, self::ENTRANCE], $value);
    }

    public static function values(): array
    {
        return [self::GATE_LABEL_UNSPECIFIED, self::GATE, self::DOOR, self::ENTRANCE];
    }
}
