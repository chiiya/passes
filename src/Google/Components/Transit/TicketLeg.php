<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Transit;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MinItems;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TicketLeg extends Component
{
    /**
     * Optional.
     * The origin station code. This is required if destinationStationCode is present or if
     * originName is not present.
     */
    public ?string $originStationCode;

    /**
     * Optional.
     * The name of the origin station. This is required if destinationName is present or if
     * originStationCode is not present.
     */
    public ?LocalizedString $originName;

    /**
     * Optional.
     * The destination station code.
     */
    public ?string $destinationStationCode;

    /**
     * Optional.
     * The destination name.
     */
    public ?LocalizedString $destinationName;

    /**
     * Optional.
     * The date/time of departure. This is required if there is no validity time interval set on the transit object.
     */
    public ?string $departureDateTime;

    /**
     * Optional.
     * The date/time of arrival.
     */
    public ?string $arrivalDateTime;

    /**
     * Optional.
     * Short description/name of the fare for this leg of travel. Eg "Anytime Single Use".
     */
    public ?LocalizedString $fareName;

    /**
     * Optional.
     * The train or ship name/number that the passenger needs to board.
     */
    public ?string $carriage;

    /**
     * Optional.
     * The platform or gate where the passenger can board the carriage.
     */
    public ?string $platform;

    /**
     * Optional.
     * The zone of boarding within the platform.
     */
    public ?string $zone;

    /**
     * Optional.
     * The reserved seat for the passenger(s). If more than one seat is to be specified then use the
     * ticketSeats field instead. Both ticketSeat and ticketSeats may not be set.
     */
    public ?TicketSeat $ticketSeat;

    /**
     * Optional.
     * The reserved seat for the passenger(s). If only one seat is to be specified then use the ticketSeat
     * field instead. Both ticketSeat and ticketSeats may not be set.
     *
     * @var TicketSeat[]
     */
    #[CastWith(ArrayCaster::class, TicketSeat::class)]
    #[MinItems(2)]
    public array $ticketSeats = [];

    /**
     * Optional.
     * The name of the transit operator that is operating this leg of a trip.
     */
    public ?LocalizedString $transitOperatorName;

    /**
     * Optional.
     * Terminus station or destination of the train/bus/etc.
     */
    public ?LocalizedString $transitTerminusName;
}
