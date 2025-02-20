<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\Flight\BoardingPolicy;
use Chiiya\Passes\Google\Enumerators\Flight\SeatClassPolicy;
use Symfony\Component\Validator\Constraints\Choice;

class BoardingAndSeatingPolicy extends Component
{
    public function __construct(
        /**
         * Optional.
         * Indicates the policy the airline uses for boarding. If unset, Google will default to ZONE_BASED.
         *
         * @see BoardingPolicy
         */
        #[Choice([
            BoardingPolicy::BOARDING_POLICY_UNSPECIFIED,
            BoardingPolicy::ZONE_BASED,
            BoardingPolicy::GROUP_BASED,
            BoardingPolicy::BOARDING_POLICY_OTHER,
        ])]
        #[Cast(LegacyValueCaster::class, BoardingPolicy::class)]
        public ?string $boardingPolicy = null,
        /**
         * Optional.
         * Seating policy which dictates how we display the seat class. If unset, Google will default to CABIN_BASED.
         */
        #[Choice([
            SeatClassPolicy::SEAT_CLASS_POLICY_UNSPECIFIED,
            SeatClassPolicy::CABIN_BASED,
            SeatClassPolicy::CLASS_BASED,
            SeatClassPolicy::TIER_BASED,
            SeatClassPolicy::SEAT_CLASS_POLICY_OTHER,
        ])]
        #[Cast(LegacyValueCaster::class, SeatClassPolicy::class)]
        public ?string $seatClassPolicy = null,
    ) {
        parent::__construct();
    }
}
