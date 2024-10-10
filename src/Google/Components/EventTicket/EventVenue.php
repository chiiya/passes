<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class EventVenue extends Component
{
    public function __construct(
        /**
         * Required.
         * The name of the venue, such as "AT&T Park".
         */
        public LocalizedString $name,
        /**
         * Required.
         * The address of the venue, such as "24 Willie Mays Plaza\nSan Francisco, CA 94107". Address lines
         * are separated by line feed (\n) characters.
         */
        public LocalizedString $address,
    ) {
        parent::__construct();
    }
}
