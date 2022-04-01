<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Google\Components\Common\Uri;

class DiscoverableProgramMerchantSigninInfo extends Component
{
    /**
     * Required.
     * The URL to direct the user to for the merchant's signin site.
     */
    #[Required]
    public ?Uri $signinWebsite;
}
