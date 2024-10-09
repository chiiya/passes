<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Symfony\Component\Validator\Constraints\NotBlank;

class FrequentFlyerInfo extends Component
{
    public function __construct(
        /**
         * Required.
         * Frequent flyer number.
         */
        #[NotBlank]
        public string $frequentFlyerNumber,
        /**
         * Optional.
         * Frequent flyer program name. eg: "Lufthansa Miles & More".
         */
        public ?LocalizedString $frequentFlyerProgramName = null,
    ) {
        parent::__construct();
    }
}
