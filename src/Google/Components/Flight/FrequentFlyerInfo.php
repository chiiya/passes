<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class FrequentFlyerInfo extends Component
{
    /**
     * Optional.
     * Frequent flyer program name. eg: "Lufthansa Miles & More".
     */
    public ?LocalizedString $frequentFlyerProgramName;

    /**
     * Required.
     * Frequent flyer number.
     */
    #[Required]
    public ?string $frequentFlyerNumber;
}
