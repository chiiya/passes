<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class LoyaltyPoints extends Component
{
    /**
     * Optional.
     * The loyalty points label, such as "Points". Recommended maximum length is 9 characters.
     */
    #[MaxLength(9)]
    public ?string $label;

    /**
     * Required.
     * The account holder's loyalty point balance. This is a required field of loyaltyPoints and
     * secondaryLoyaltyPoints.
     */
    #[Required]
    public ?LoyaltyPointsBalance $balance;

    /**
     * Optional.
     * Translated strings for the label. Recommended maximum length is 9 characters.
     */
    public ?LocalizedString $localizedLabel;
}
