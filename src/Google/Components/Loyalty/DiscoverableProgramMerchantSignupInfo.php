<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\Loyalty\SharedDataType;
use Symfony\Component\Validator\Constraints\Choice;

class DiscoverableProgramMerchantSignupInfo extends Component
{
    public function __construct(
        /**
         * Optional.
         * The URL to direct the user to for the merchant's signup site.
         */
        public ?Uri $signupWebsite = null,
        /**
         * Optional.
         * User data that is sent in a POST request to the signup website URL. This information is encoded and
         * then shared so that the merchant's website can prefill fields used to enroll the user for the
         * discoverable program.
         */
        #[Choice([
            SharedDataType::SHARED_DATA_TYPE_UNSPECIFIED,
            SharedDataType::FIRST_NAME,
            SharedDataType::LAST_NAME,
            SharedDataType::STREET_ADDRESS,
            SharedDataType::ADDRESS_LINE_1,
            SharedDataType::ADDRESS_LINE_2,
            SharedDataType::ADDRESS_LINE_3,
            SharedDataType::CITY,
            SharedDataType::STATE,
            SharedDataType::ZIPCODE,
            SharedDataType::COUNTRY,
            SharedDataType::EMAIL,
            SharedDataType::PHONE,
        ])]
        public array $signupSharedDatas = [],
    ) {
        parent::__construct();
    }
}
