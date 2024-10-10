<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Transit;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class TicketRestrictions extends Component
{
    public function __construct(
        /**
         * Optional.
         * Restrictions about routes that may be taken. For example, this may be the string
         * "Reserved CrossCountry trains only".
         */
        public ?LocalizedString $routeRestrictions = null,
        /**
         * Optional.
         * More details about the above routeRestrictions.
         */
        public ?LocalizedString $routeRestrictionsDetails = null,
        /**
         * Optional.
         * Restrictions about times this ticket may be used.
         */
        public ?LocalizedString $timeRestrictions = null,
        /**
         * Optional.
         * Extra restrictions that don't fall under the "route" or "time" categories.
         */
        public ?LocalizedString $otherRestrictions = null,
    ) {
        parent::__construct();
    }
}
