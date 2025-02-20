<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\Offer\RedemptionChannel;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class OfferClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'offerClass';

    public function __construct(
        /**
         * Required.
         * The title of the offer, such as "20% off any t-shirt." Recommended maximum length is 60 characters
         * to ensure full string is displayed on smaller screens.
         */
        #[NotBlank]
        #[Length(max: 60)]
        public string $title,
        /**
         * Required.
         * The redemption channels applicable to this offer.
         */
        #[Choice([
            RedemptionChannel::REDEMPTION_CHANNEL_UNSPECIFIED,
            RedemptionChannel::INSTORE,
            RedemptionChannel::ONLINE,
            RedemptionChannel::BOTH,
            RedemptionChannel::TEMPORARY_PRICE_REDUCTION,
        ])]
        #[Cast(LegacyValueCaster::class, RedemptionChannel::class)]
        #[NotBlank]
        public string $redemptionChannel,
        /**
         * Required.
         * The offer provider (either the aggregator name or merchant name). Recommended maximum length is 12
         * characters to ensure full string is displayed on smaller screens.
         */
        #[NotBlank]
        #[Length(max: 12)]
        public string $provider,
        /**
         * Optional.
         * The title image of the offer. This image is displayed in both the details and list views of the app.
         */
        public ?Image $titleImage = null,
        /**
         * Optional.
         * The wide title image of the offer. When provided, this will be used in place of the title image in the top left of the card view.
         */
        public ?Image $wideTitleImage = null,
        /**
         * Optional.
         * The details of the offer.
         */
        public ?string $details = null,
        /**
         * Optional.
         * The fine print or terms of the offer, such as "20% off any t-shirt at Adam's Apparel.".
         */
        public ?string $finePrint = null,
        /**
         * Optional.
         * The help link for the offer, such as http://myownpersonaldomain.com/help.
         */
        public ?Uri $helpUri = null,
        /**
         * Optional.
         * Translated strings for the title. Recommended maximum length is 60 characters to ensure full
         * string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedTitle = null,
        /**
         * Optional.
         * Translated strings for the provider. Recommended maximum length is 12 characters to ensure full
         * string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedProvider = null,
        /**
         * Optional.
         * Translated strings for the details.
         */
        public ?LocalizedString $localizedDetails = null,
        /**
         * Optional.
         * Translated strings for the finePrint.
         */
        public ?LocalizedString $localizedFinePrint = null,
        /**
         * Optional.
         * A shortened version of the title of the offer, such as "20% off," shown to users as a quick reference
         * to the offer contents. Recommended maximum length is 20 characters.
         */
        #[Length(max: 20)]
        public ?string $shortTitle = null,
        /**
         * Optional.
         * Translated strings for the short title. Recommended maximum length is 20 characters.
         */
        public ?LocalizedString $localizedShortTitle = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
