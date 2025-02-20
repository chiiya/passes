<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Loyalty\LoyaltyPoints;
use Symfony\Component\Validator\Constraints\Length;

class LoyaltyObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'loyaltyObject';

    public function __construct(
        /**
         * Optional.
         * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
         */
        public ?LoyaltyClass $classReference = null,
        /**
         * Optional.
         * The loyalty account holder name, such as "John Smith." Recommended maximum length is 20 characters
         * to ensure full string is displayed on smaller screens.
         */
        #[Length(max: 20)]
        public ?string $accountName = null,
        /**
         * Optional.
         * The loyalty account identifier. Recommended maximum length is 20 characters.
         */
        #[Length(max: 20)]
        public ?string $accountId = null,
        /**
         * Optional.
         * The loyalty reward points label, balance, and type.
         */
        public ?LoyaltyPoints $loyaltyPoints = null,
        /**
         * Optional.
         * A list of offer objects linked to this loyalty card. The offer objects must already exist. Offer object IDs
         * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
         */
        public array $linkedOfferIds = [],
        /**
         * Optional.
         * The secondary loyalty reward points label, balance, and type. Shown in addition to the primary loyalty points.
         */
        public ?LoyaltyPoints $secondaryLoyaltyPoints = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
