<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Flight\AirportInfo;
use Chiiya\Passes\Google\Components\Flight\BoardingAndSeatingPolicy;
use Chiiya\Passes\Google\Components\Flight\FlightHeader;
use Chiiya\Passes\Google\Enumerators\Flight\FlightStatus;
use Spatie\DataTransferObject\Attributes\CastWith;

class FlightClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'flightClass';

    /**
     * Required.
     * The scheduled date and time when the aircraft is expected to depart the gate (not the runway).
     */
    #[Required]
    public ?string $localScheduledDepartureDateTime;

    /**
     * Optional.
     * The estimated time the aircraft plans to pull from the gate or the actual time the aircraft already
     * pulled from the gate. Note: This is not the runway time.
     */
    public ?string $localEstimatedOrActualDepartureDateTime;

    /**
     * Optional.
     * The boarding time as it would be printed on the boarding pass.
     */
    public ?string $localBoardingDateTime;

    /**
     * Optional.
     * The scheduled time the aircraft plans to reach the destination gate (not the runway).
     */
    public ?string $localScheduledArrivalDateTime;

    /**
     * Optional.
     * The estimated time the aircraft plans to reach the destination gate (not the runway) or the actual
     * time it reached the gate.
     */
    public ?string $localEstimatedOrActualArrivalDateTime;

    /**
     * Required.
     * Information about the flight carrier and number.
     */
    #[Required]
    public ?FlightHeader $flightHeader;

    /**
     * Required.
     * Origin airport.
     */
    #[Required]
    public ?AirportInfo $origin;

    /**
     * Required.
     * Destination airport.
     */
    #[Required]
    public ?AirportInfo $destination;

    /**
     * Optional.
     * If unset, Google will compute status based on data from other sources, such as FlightStats, etc.
     */
    #[ValueIn([
        FlightStatus::FLIGHT_STATUS_UNSPECIFIED,
        FlightStatus::SCHEDULED,
        FlightStatus::ACTIVE,
        FlightStatus::LANDED,
        FlightStatus::CANCELLED,
        FlightStatus::REDIRECTED,
        FlightStatus::DIVERTED,
    ])]
    #[CastWith(LegacyValueCaster::class, FlightStatus::class)]
    public ?string $flightStatus;

    /**
     * Optional.
     * Policies for boarding and seating. These will inform which labels will be shown to users.
     */
    public ?BoardingAndSeatingPolicy $boardingAndSeatingPolicy;

    /**
     * Optional.
     * The gate closing time as it would be printed on the boarding pass. Do not set this field if you do
     * not want to print it in the boarding pass.
     */
    public ?string $localGateClosingDateTime;
}
