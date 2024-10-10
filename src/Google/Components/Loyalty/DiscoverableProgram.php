<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\Loyalty\VisibilityState;
use Symfony\Component\Validator\Constraints\Choice;

class DiscoverableProgram extends Component
{
    public function __construct(
        /**
         * Optional.
         * Information about the ability to signup and add a valuable for this program through a merchant site.
         * Used when MERCHANT_HOSTED_SIGNUP is enabled.
         */
        public ?DiscoverableProgramMerchantSignupInfo $merchantSignupInfo = null,
        /**
         * Optional.
         * Information about the ability to signin and add a valuable for this program through a merchant site.
         * Used when MERCHANT_HOSTED_SIGNIN is enabled.
         */
        public ?DiscoverableProgramMerchantSigninInfo $merchantSigninInfo = null,
        /**
         * Optional.
         * Visibility state of the discoverable program.
         */
        #[Choice([
            VisibilityState::STATE_UNSPECIFIED,
            VisibilityState::TRUSTED_TESTERS,
            VisibilityState::LIVE,
            VisibilityState::DISABLED,
        ])]
        #[Cast(LegacyValueCaster::class, VisibilityState::class)]
        public ?string $state = null,
    ) {
        parent::__construct();
    }
}
