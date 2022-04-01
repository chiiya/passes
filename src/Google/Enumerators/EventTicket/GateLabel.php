<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\EventTicket;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class GateLabel implements LegacyValueEnumerator
{
    /** @var string */
    public const GATE_LABEL_UNSPECIFIED = 'GATE_LABEL_UNSPECIFIED';

    /** @var string */
    public const GATE = 'GATE';

    /** @var string */
    public const DOOR = 'DOOR';

    /** @var string */
    public const ENTRANCE = 'ENTRANCE';

    public static function values(): array
    {
        return [self::GATE_LABEL_UNSPECIFIED, self::GATE, self::DOOR, self::ENTRANCE];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace(['gate', 'door', 'entrance'], [self::GATE, self::DOOR, self::ENTRANCE], $value);
    }
}
