<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class Location extends Component
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
        /**
         * Optional.
         * Altitude, in meters, of the location.
         */
        public ?float $altitude = null,
        /**
         * Optional.
         * ext displayed on the lock screen when the pass is currently relevant.
         */
        public ?string $relevantText = null,
    ) {
        parent::__construct();
    }
}
