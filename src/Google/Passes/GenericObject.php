<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Generic\Notifications;
use Chiiya\Passes\Google\Enumerators\Generic\GenericType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\CssColor;

class GenericObject extends AbstractObject
{
    /** @var string */
    final public const IDENTIFIER = 'genericObject';

    public function __construct(
        /**
         * Required
         * The title of the pass. This is usually the Business name such as "XXX Gym", "AAA Insurance".
         */
        public LocalizedString $cardTitle,
        /**
         * Required
         * The header of the pass, such as "50% off coupon" or "Library card" or "Voucher".
         */
        public LocalizedString $header,
        /**
         * Optional
         * The type of the generic card.
         */
        #[Choice([
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
        public ?string $genericType = null,
        /**
         * Optional
         * The subheader of the pass, such as location where this pass can be used.
         */
        public ?LocalizedString $subheader = null,
        /**
         * Optional.
         * The logo image of the ticket. This image is displayed in the card detail view of the app.
         */
        public ?Image $logo = null,
        /**
         * Optional.
         * The wide logo of the pass. When provided, this will be used in place of the logo in the top left of the card view.
         */
        public ?Image $wideLogo = null,
        /**
         * Optional.
         * The background color for the card. If not set, the dominant color of the hero image is used, and if no hero
         * image is set, the dominant color of the logo is used and if logo is not set, a color would be chosen by Google.
         */
        #[CssColor(formats: [CssColor::HEX_LONG, CssColor::HEX_SHORT])]
        public ?string $hexBackgroundColor = null,
        /**
         * Optional.
         * Indicates if the object needs to have notification enabled.
         */
        public ?Notifications $notifications = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
