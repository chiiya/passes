<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class SeatClassPolicy implements LegacyValueEnumerator
{
    /** @var string */
    public const SEAT_CLASS_POLICY_UNSPECIFIED = 'SEAT_CLASS_POLICY_UNSPECIFIED';

    /** @var string */
    public const CABIN_BASED = 'CABIN_BASED';

    /** @var string */
    public const CLASS_BASED = 'CLASS_BASED';

    /** @var string */
    public const TIER_BASED = 'TIER_BASED';

    /** @var string */
    public const SEAT_CLASS_POLICY_OTHER = 'SEAT_CLASS_POLICY_OTHER';

    public static function values(): array
    {
        return [
            self::SEAT_CLASS_POLICY_UNSPECIFIED,
            self::CABIN_BASED,
            self::CLASS_BASED,
            self::TIER_BASED,
            self::SEAT_CLASS_POLICY_OTHER,
        ];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'cabinBased',
            'classBased',
            'tierBased',
            'seatClassPolicyOther',
        ], [self::CABIN_BASED, self::CLASS_BASED, self::TIER_BASED, self::SEAT_CLASS_POLICY_OTHER], $value);
    }
}
