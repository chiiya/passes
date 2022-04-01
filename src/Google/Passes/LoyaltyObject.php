<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Google\Components\Loyalty\LoyaltyPoints;

class LoyaltyObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'loyaltyObject';

    /**
     * Optional.
     * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
     */
    public ?LoyaltyClass $classReference;

    /**
     * Optional.
     * The loyalty account holder name, such as "John Smith." Recommended maximum length is 20 characters
     * to ensure full string is displayed on smaller screens.
     */
    #[MaxLength(20)]
    public ?string $accountName;

    /**
     * Optional.
     * The loyalty account identifier. Recommended maximum length is 20 characters.
     */
    #[MaxLength(20)]
    public ?string $accountId;

    /**
     * Optional.
     * The loyalty reward points label, balance, and type.
     */
    public ?LoyaltyPoints $loyaltyPoints;

    /**
     * Optional.
     * A list of offer objects linked to this loyalty card. The offer objects must already exist. Offer object IDs
     * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
     */
    public array $linkedOfferIds = [];

    /**
     * Optional.
     * The secondary loyalty reward points label, balance, and type. Shown in addition to the primary loyalty points.
     */
    public ?LoyaltyPoints $secondaryLoyaltyPoints;
}
