<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class EventReservationInfo extends Component
{
    /**
     * Required.
     * The confirmation code of the event reservation. This may also take the form of an "order number",
     * "confirmation number", "reservation number", or other equivalent.
     */
    #[Required]
    public ?string $confirmationCode;
}
