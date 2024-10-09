<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class FlightHeader extends Component
{
    public function __construct(
        /**
         * Required.
         * Information about airline carrier. This is a required property of flightHeader.
         */
        public FlightCarrier $carrier,
        /**
         * Required.
         * The flight number without IATA carrier code. This field should contain only digits.
         * This is a required property of flightHeader.
         */
        #[NotBlank]
        public string $flightNumber,
        /**
         * Optional.
         * Information about operating airline carrier.
         */
        public ?FlightCarrier $operatingCarrier = null,
        /**
         * Optional.
         * The flight number used by the operating carrier without IATA carrier code.
         * This field should contain only digits.
         */
        public ?string $operatingFlightNumber = null,
    ) {
        parent::__construct();
    }
}
