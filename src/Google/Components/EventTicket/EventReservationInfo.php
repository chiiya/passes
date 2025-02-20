<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class EventReservationInfo extends Component
{
    public function __construct(
        /**
         * Required.
         * The confirmation code of the event reservation. This may also take the form of an "order number",
         * "confirmation number", "reservation number", or other equivalent.
         */
        #[NotBlank]
        public string $confirmationCode,
    ) {
        parent::__construct();
    }
}
