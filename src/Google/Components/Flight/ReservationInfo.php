<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;

class ReservationInfo extends Component
{
    /**
     * Optional.
     * Confirmation code needed to check into this flight. This is the number that the passenger would enter
     * into a kiosk at the airport to look up the flight and print a boarding pass.
     */
    public ?string $confirmationCode;

    /**
     * Optional.
     * E-ticket number.
     */
    public ?string $eticketNumber;

    /**
     * Optional.
     * Frequent flyer membership information.
     */
    public ?FrequentFlyerInfo $frequentFlyerInfo;
}
