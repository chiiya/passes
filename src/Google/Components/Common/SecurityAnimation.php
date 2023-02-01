<?php

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\AnimationType;
use Spatie\DataTransferObject\Attributes\CastWith;

class SecurityAnimation extends Component
{
    /**
     * Required.
     * Type of animation.
     */
    #[Required]
    #[ValueIn([
        AnimationType::ANIMATION_UNSPECIFIED,
        AnimationType::FOIL_SHIMMER
    ])]
    #[CastWith(LegacyValueCaster::class, AnimationType::class)]
    public ?string $animationType;
}
