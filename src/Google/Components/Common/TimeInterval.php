<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class TimeInterval extends Component
{
    public function __construct(
        /**
         * Required.
         * Start time of the interval.
         */
        public ?DateTime $start,
        /**
         * Required.
         * End time of the interval.
         */
        public ?DateTime $end,
    ) {
        parent::__construct();
    }
}
