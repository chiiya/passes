<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class SemanticLocation extends Component
{
    public function __construct(
        /**
         * Required.
         * Latitude, in degrees, of the location.
         */
        #[NotBlank]
        public float $latitude,
        /**
         * Required.
         * Longitude, in degrees, of the location.
         */
        #[NotBlank]
        public float $longitude,
    ) {
        parent::__construct();
    }
}
