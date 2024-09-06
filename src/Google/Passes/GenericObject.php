<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Validation\HexColor;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Generic\Notifications;
use Chiiya\Passes\Google\Enumerators\Generic\GenericType;

class GenericObject extends AbstractObject
{
    /** @var string */
    final public const IDENTIFIER = 'genericObject';

    /**
     * Optional
     * The type of the generic card.
     */
    #[ValueIn([
        GenericType::GENERIC_TYPE_UNSPECIFIED,
        GenericType::GENERIC_SEASON_PASS,
        GenericType::GENERIC_UTILITY_BILLS,
        GenericType::GENERIC_PARKING_PASS,
        GenericType::GENERIC_VOUCHER,
        GenericType::GENERIC_GYM_MEMBERSHIP,
        GenericType::GENERIC_LIBRARY_MEMBERSHIP,
        GenericType::GENERIC_RESERVATIONS,
        GenericType::GENERIC_AUTO_INSURANCE,
        GenericType::GENERIC_HOME_INSURANCE,
        GenericType::GENERIC_ENTRY_TICKET,
        GenericType::GENERIC_RECEIPT,
        GenericType::GENERIC_OTHER,
    ])]
    public ?string $genericType;

    /**
     * Required
     * The title of the pass. This is usually the Business name such as "XXX Gym", "AAA Insurance".
     */
    public LocalizedString $cardTitle;

    /**
     * Optional
     * The subheader of the pass, such as location where this pass can be used.
     */
    public ?LocalizedString $subheader;

    /**
     * Required
     * The header of the pass, such as "50% off coupon" or "Library card" or "Voucher".
     */
    public LocalizedString $header;

    /**
     * Optional.
     * The logo image of the ticket. This image is displayed in the card detail view of the app.
     */
    public ?Image $logo;

    /**
     * Optional.
     * The wide logo of the pass. When provided, this will be used in place of the logo in the top left of the card view.
     */
    public ?Image $wideLogo;

    /**
     * Optional.
     * The background color for the card. If not set, the dominant color of the hero image is used, and if no hero
     * image is set, the dominant color of the logo is used and if logo is not set, a color would be chosen by Google.
     */
    #[HexColor]
    public ?string $hexBackgroundColor;

    /**
     * Optional.
     * Indicates if the object needs to have notification enabled.
     */
    public ?Notifications $notifications;
}
