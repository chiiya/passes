<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class TimeInterval extends Component
{
    /**
     * Required.
     * Start time of the interval.
     */
    #[Required]
    public ?DateTime $start;

    /**
     * Required.
     * End time of the interval.
     */
    #[Required]
    public ?DateTime $end;
}
