<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Transit;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Money;

class TicketCost extends Component
{
    public function __construct(
        /**
         * Optional.
         * The face value of the ticket.
         */
        public ?Money $faceValue = null,
        /**
         * Optional.
         * The actual purchase price of the ticket, after tax and/or discounts.
         */
        public ?Money $purchasePrice = null,
        /**
         * Optional.
         * A message describing any kind of discount that was applied.
         */
        public ?LocalizedString $discountMessage = null,
    ) {
        parent::__construct();
    }
}
