<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\AnimationType;

class SecurityAnimation extends Component
{
    /**
     * Required.
     * Type of animation.
     */
    #[Required]
    #[ValueIn([AnimationType::ANIMATION_UNSPECIFIED, AnimationType::FOIL_SHIMMER])]
    public ?string $animationType;
}
