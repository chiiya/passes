<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Transit;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Symfony\Component\Validator\Constraints\Count;

class TicketLeg extends Component
{
    public function __construct(
        /**
         * Optional.
         * The origin station code. This is required if destinationStationCode is present or if
         * originName is not present.
         */
        public ?string $originStationCode = null,
        /**
         * Optional.
         * The name of the origin station. This is required if destinationName is present or if
         * originStationCode is not present.
         */
        public ?LocalizedString $originName = null,
        /**
         * Optional.
         * The destination station code.
         */
        public ?string $destinationStationCode = null,
        /**
         * Optional.
         * The destination name.
         */
        public ?LocalizedString $destinationName = null,
        /**
         * Optional.
         * The date/time of departure. This is required if there is no validity time interval set on the transit object.
         */
        public ?string $departureDateTime = null,
        /**
         * Optional.
         * The date/time of arrival.
         */
        public ?string $arrivalDateTime = null,
        /**
         * Optional.
         * Short description/name of the fare for this leg of travel. Eg "Anytime Single Use".
         */
        public ?LocalizedString $fareName = null,
        /**
         * Optional.
         * The train or ship name/number that the passenger needs to board.
         */
        public ?string $carriage = null,
        /**
         * Optional.
         * The platform or gate where the passenger can board the carriage.
         */
        public ?string $platform = null,
        /**
         * Optional.
         * The zone of boarding within the platform.
         */
        public ?string $zone = null,
        /**
         * Optional.
         * The reserved seat for the passenger(s). If more than one seat is to be specified then use the
         * ticketSeats field instead. Both ticketSeat and ticketSeats may not be set.
         */
        public ?TicketSeat $ticketSeat = null,
        /**
         * Optional.
         * The reserved seat for the passenger(s). If only one seat is to be specified then use the ticketSeat
         * field instead. Both ticketSeat and ticketSeats may not be set.
         *
         * @var TicketSeat[]
         */
        #[Cast(ArrayCaster::class, TicketSeat::class)]
        #[Count(min: 2)]
        public ?array $ticketSeats = null,
        /**
         * Optional.
         * The name of the transit operator that is operating this leg of a trip.
         */
        public ?LocalizedString $transitOperatorName = null,
        /**
         * Optional.
         * Terminus station or destination of the train/bus/etc.
         */
        public ?LocalizedString $transitTerminusName = null,
    ) {
        parent::__construct();
    }
}
