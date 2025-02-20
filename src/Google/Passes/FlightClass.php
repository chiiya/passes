<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Flight\AirportInfo;
use Chiiya\Passes\Google\Components\Flight\BoardingAndSeatingPolicy;
use Chiiya\Passes\Google\Components\Flight\FlightHeader;
use Chiiya\Passes\Google\Enumerators\Flight\FlightStatus;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class FlightClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'flightClass';

    public function __construct(
        /**
         * Required.
         * The scheduled date and time when the aircraft is expected to depart the gate (not the runway).
         */
        #[NotBlank]
        public string $localScheduledDepartureDateTime,
        /**
         * Required.
         * Information about the flight carrier and number.
         */
        public FlightHeader $flightHeader,
        /**
         * Required.
         * Origin airport.
         */
        public AirportInfo $origin,
        /**
         * Required.
         * Destination airport.
         */
        public AirportInfo $destination,
        /**
         * Optional.
         * The estimated time the aircraft plans to pull from the gate or the actual time the aircraft already
         * pulled from the gate. Note: This is not the runway time.
         */
        public ?string $localEstimatedOrActualDepartureDateTime = null,
        /**
         * Optional.
         * The boarding time as it would be printed on the boarding pass.
         */
        public ?string $localBoardingDateTime = null,
        /**
         * Optional.
         * The scheduled time the aircraft plans to reach the destination gate (not the runway).
         */
        public ?string $localScheduledArrivalDateTime = null,
        /**
         * Optional.
         * The estimated time the aircraft plans to reach the destination gate (not the runway) or the actual
         * time it reached the gate.
         */
        public ?string $localEstimatedOrActualArrivalDateTime = null,
        /**
         * Optional.
         * If unset, Google will compute status based on data from other sources, such as FlightStats, etc.
         */
        #[Choice([
            FlightStatus::FLIGHT_STATUS_UNSPECIFIED,
            FlightStatus::SCHEDULED,
            FlightStatus::ACTIVE,
            FlightStatus::LANDED,
            FlightStatus::CANCELLED,
            FlightStatus::REDIRECTED,
            FlightStatus::DIVERTED,
        ])]
        #[Cast(LegacyValueCaster::class, FlightStatus::class)]
        public ?string $flightStatus = null,
        /**
         * Optional.
         * Policies for boarding and seating. These will inform which labels will be shown to users.
         */
        public ?BoardingAndSeatingPolicy $boardingAndSeatingPolicy = null,
        /**
         * Optional.
         * The gate closing time as it would be printed on the boarding pass. Do not set this field if you do
         * not want to print it in the boarding pass.
         */
        public ?string $localGateClosingDateTime = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
