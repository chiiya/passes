<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Symfony\Component\Validator\Constraints\Length;

class LoyaltyPoints extends Component
{
    public function __construct(
        /**
         * Required.
         * The account holder's loyalty point balance. This is a required field of loyaltyPoints and
         * secondaryLoyaltyPoints.
         */
        public LoyaltyPointsBalance $balance,
        /**
         * Optional.
         * The loyalty points label, such as "Points". Recommended maximum length is 9 characters.
         */
        #[Length(max: 9)]
        public ?string $label = null,
        /**
         * Optional.
         * Translated strings for the label. Recommended maximum length is 9 characters.
         */
        public ?LocalizedString $localizedLabel = null,
    ) {
        parent::__construct();
    }
}
