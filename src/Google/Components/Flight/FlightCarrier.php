<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class FlightCarrier extends Component
{
    /**
     * Required.
     * Two character IATA airline code of the marketing carrier (as opposed to operating carrier).
     * Exactly one of this or carrierIcaoCode needs to be provided for carrier and operatingCarrier.
     */
    #[MaxLength(2)]
    public ?string $carrierIataCode;

    /**
     * Required.
     * Three character ICAO airline code of the marketing carrier (as opposed to operating carrier). Exactly
     * one of this or carrierIataCode needs to be provided for carrier and operatingCarrier.
     */
    #[MaxLength(3)]
    public ?string $carrierIcaoCode;

    /**
     * Optional.
     * A localized name of the airline specified by carrierIataCode. If unset, issuerName or
     * localizedIssuerName from FlightClass will be used for display purposes.
     */
    public ?LocalizedString $airlineName;

    /**
     * Optional.
     * A logo for the airline described by carrierIataCode and localizedAirlineName. This logo will be
     * rendered at the top of the detailed card view.
     */
    public ?Image $airlineLogo;

    /**
     * Optional.
     * A logo for the airline alliance, displayed above the QR code that the passenger scans to board.
     */
    public ?Image $airlineAllianceLogo;
}
