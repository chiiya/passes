<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Transit;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\Transit\FareClass;
use Symfony\Component\Validator\Constraints\Choice;

class TicketSeat extends Component
{
    public function __construct(
        /**
         * Optional.
         * The fare class of the ticketed seat.
         *
         * @see FareClass
         */
        #[Choice([FareClass::FARE_CLASS_UNSPECIFIED, FareClass::ECONOMY, FareClass::FIRST, FareClass::BUSINESS])]
        #[Cast(LegacyValueCaster::class, FareClass::class)]
        public ?string $fareClass = null,
        /**
         * Optional.
         * A custom fare class to be used if no fareClass applies. Both fareClass and customFareClass may not be set.
         */
        public ?LocalizedString $customFareClass = null,
        /**
         * Optional.
         * The identifier of the train car or coach in which the ticketed seat is located. Eg. "10".
         */
        public ?string $coach = null,
        /**
         * Optional.
         * The identifier of where the ticketed seat is located. Eg. "42". If there is no specific
         * identifier, use seatAssigment instead.
         */
        public ?string $seat = null,
        /**
         * Optional.
         * The passenger's seat assignment. E.g. "no specific seat". To be used when there is no
         * specific identifier to use in seat.
         */
        public ?LocalizedString $seatAssignment = null,
    ) {
        parent::__construct();
    }
}
