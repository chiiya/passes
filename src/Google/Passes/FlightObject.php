<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Flight\BoardingAndSeatingInfo;
use Chiiya\Passes\Google\Components\Flight\ReservationInfo;
use Symfony\Component\Validator\Constraints\CssColor;
use Symfony\Component\Validator\Constraints\NotBlank;

class FlightObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'flightObject';

    public function __construct(
        /**
         * Required.
         * Passenger name as it would appear on the boarding pass.
         */
        #[NotBlank]
        public string $passengerName,
        /**
         * Required.
         * Information about flight reservation.
         */
        public ReservationInfo $reservationInfo,
        /**
         * Optional.
         * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
         */
        public ?FlightClass $classReference = null,
        /**
         * Optional.
         * Passenger specific information about boarding and seating.
         */
        public ?BoardingAndSeatingInfo $boardingAndSeatingInfo = null,
        /**
         * Optional.
         * An image for the security program that applies to the passenger.
         */
        public ?Image $securityProgramLogo = null,
        /**
         * Optional.
         * The background color for the card. If not set the dominant color of the hero image is used, and if no hero
         * image is set, the dominant color of the logo is used. The format is #rrggbb where rrggbb is a hex RGB triplet,
         * such as #ffcc00. You can also use the shorthand version of the RGB triplet which is #rgb, such as #fc0.
         */
        #[CssColor(formats: [CssColor::HEX_LONG, CssColor::HEX_SHORT])]
        public ?string $hexBackgroundColor = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
