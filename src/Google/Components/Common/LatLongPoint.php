<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class LatLongPoint extends Component
{
    public function __construct(
        /**
         * Required.
         * The latitude specified as any value in the range of -90.0 through +90.0, both inclusive. Values outside
         * these bounds will be rejected.
         */
        #[NotBlank]
        public float $latitude,
        /**
         * Required.
         * The longitude specified in the range -180.0 through +180.0, both inclusive. Values outside these bounds
         * will be rejected.
         */
        #[NotBlank]
        public float $longitude,
    ) {
        parent::__construct();
    }
}
