<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BoardingPolicy implements LegacyValueEnumerator
{
    /** @var string */
    public const BOARDING_POLICY_UNSPECIFIED = 'BOARDING_POLICY_UNSPECIFIED';

    /** @var string */
    public const ZONE_BASED = 'ZONE_BASED';

    /** @var string */
    public const GROUP_BASED = 'GROUP_BASED';

    /** @var string */
    public const BOARDING_POLICY_OTHER = 'BOARDING_POLICY_OTHER';

    public static function values(): array
    {
        return [
            self::BOARDING_POLICY_UNSPECIFIED,
            self::ZONE_BASED,
            self::GROUP_BASED,
            self::BOARDING_POLICY_OTHER,
        ];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'zoneBased',
            'groupBased',
            'boardingPolicyOther',
        ], [self::ZONE_BASED, self::GROUP_BASED, self::BOARDING_POLICY_OTHER], $value);
    }
}
