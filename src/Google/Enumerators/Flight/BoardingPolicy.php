<?php

namespace Chiiya\Passes\Google\Enumerators\Flight;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BoardingPolicy implements LegacyValueEnumerator
{
    public const BOARDING_POLICY_UNSPECIFIED = 'BOARDING_POLICY_UNSPECIFIED';

    public const ZONE_BASED = 'ZONE_BASED';

    public const GROUP_BASED = 'GROUP_BASED';

    public const BOARDING_POLICY_OTHER = 'BOARDING_POLICY_OTHER';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'zoneBased',
            'groupBased',
            'boardingPolicyOther',
        ], [self::ZONE_BASED, self::GROUP_BASED, self::BOARDING_POLICY_OTHER], $value);
    }

    public static function values(): array
    {
        return [
            self::BOARDING_POLICY_UNSPECIFIED,
            self::ZONE_BASED,
            self::GROUP_BASED,
            self::BOARDING_POLICY_OTHER,
        ];
    }
}
