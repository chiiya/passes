<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\AnimationType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class SecurityAnimation extends Component
{
    public function __construct(
        /**
         * Required.
         * Type of animation.
         */
        #[NotBlank]
        #[Choice([AnimationType::ANIMATION_UNSPECIFIED, AnimationType::FOIL_SHIMMER])]
        public string $animationType,
    ) {
        parent::__construct();
    }
}
