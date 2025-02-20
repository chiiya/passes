<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AirportInfo extends Component
{
    public function __construct(
        /**
         * Required.
         * Three character IATA airport code. This is a required field for origin and destination.
         */
        #[NotBlank]
        #[Length(max: 3)]
        public string $airportIataCode,
        /**
         * Optional.
         * Terminal name. Eg: "INTL" or "I".
         */
        public ?string $terminal = null,
        /**
         * Optional.
         * A name of the gate. Eg: "B59" or "59".
         */
        public ?string $gate = null,
        /**
         * Optional.
         * Optional field that overrides the airport city name defined by IATA. By default, Google takes the
         * airportIataCode provided and maps it to the official airport city name defined by IATA.
         */
        public ?LocalizedString $airportNameOverride = null,
    ) {
        parent::__construct();
    }
}
