<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\Loyalty\VisibilityState;
use Spatie\DataTransferObject\Attributes\CastWith;

class DiscoverableProgram extends Component
{
    /**
     * Optional.
     * Information about the ability to signup and add a valuable for this program through a merchant site.
     * Used when MERCHANT_HOSTED_SIGNUP is enabled.
     */
    public ?DiscoverableProgramMerchantSignupInfo $merchantSignupInfo;

    /**
     * Optional.
     * Information about the ability to signin and add a valuable for this program through a merchant site.
     * Used when MERCHANT_HOSTED_SIGNIN is enabled.
     */
    public ?DiscoverableProgramMerchantSigninInfo $merchantSigninInfo;

    /**
     * Optional.
     * Visibility state of the discoverable program.
     */
    #[ValueIn([
        VisibilityState::STATE_UNSPECIFIED,
        VisibilityState::TRUSTED_TESTERS,
        VisibilityState::LIVE,
        VisibilityState::DISABLED,
    ])]
    #[CastWith(LegacyValueCaster::class, VisibilityState::class)]
    public ?string $state;
}
