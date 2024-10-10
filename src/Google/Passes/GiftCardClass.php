<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class GiftCardClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'giftCardClass';

    public function __construct(
        /**
         * Optional.
         * Merchant name, such as "Adam's Apparel". The app may display an ellipsis after the first 20
         * characters to ensure full string is displayed on smaller screens.
         */
        public ?string $merchantName = null,
        /**
         * Optional.
         * The logo of the gift card program or company. This logo is displayed in both the details and list
         * views of the app.
         */
        public ?Image $programLogo = null,
        /**
         * Optional.
         * The wide logo of the gift card program or company. When provided, this will be used in place of the program logo in the top left of the card view.
         */
        public ?Image $wideProgramLogo = null,
        /**
         * Optional.
         * The label to display for the PIN, such as "4-digit PIN".
         */
        public ?string $pinLabel = null,
        /**
         * Optional.
         * The label to display for event number, such as "Target Event #".
         */
        public ?string $eventNumberLabel = null,
        /**
         * Optional.
         * Determines whether the merchant supports gift card redemption using barcode. If true, app displays a
         * barcode for the gift card on the Gift card details screen. If false, a barcode is not displayed.
         */
        public ?bool $allowBarcodeRedemption = null,
        /**
         * Optional.
         * Translated strings for the merchantName. The app may display an ellipsis after the first 20
         * characters to ensure full string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedMerchantName = null,
        /**
         * Optional.
         * Translated strings for the pinLabel.
         */
        public ?LocalizedString $localizedPinLabel = null,
        /**
         * Optional.
         * Translated strings for the eventNumberLabel.
         */
        public ?LocalizedString $localizedEventNumberLabel = null,
        /**
         * Optional.
         * The label to display for the card number, such as "Card Number".
         */
        public ?string $cardNumberLabel = null,
        /**
         * Optional.
         * Translated strings for the cardNumberLabel.
         */
        public ?LocalizedString $localizedCardNumberLabel = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
