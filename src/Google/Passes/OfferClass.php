<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\Offer\RedemptionChannel;
use Spatie\DataTransferObject\Attributes\CastWith;

class OfferClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'offerClass';

    /**
     * Required.
     * The title of the offer, such as "20% off any t-shirt." Recommended maximum length is 60 characters
     * to ensure full string is displayed on smaller screens.
     */
    #[Required]
    #[MaxLength(60)]
    public ?string $title;

    /**
     * Required.
     * The redemption channels applicable to this offer.
     */
    #[ValueIn([
        RedemptionChannel::REDEMPTION_CHANNEL_UNSPECIFIED,
        RedemptionChannel::INSTORE,
        RedemptionChannel::ONLINE,
        RedemptionChannel::BOTH,
        RedemptionChannel::TEMPORARY_PRICE_REDUCTION,
    ])]
    #[CastWith(LegacyValueCaster::class, RedemptionChannel::class)]
    #[Required]
    public ?string $redemptionChannel;

    /**
     * Required.
     * The offer provider (either the aggregator name or merchant name). Recommended maximum length is 12
     * characters to ensure full string is displayed on smaller screens.
     */
    #[Required]
    #[MaxLength(12)]
    public ?string $provider;

    /**
     * Optional.
     * The title image of the offer. This image is displayed in both the details and list views of the app.
     */
    public ?Image $titleImage;

    /**
     * Optional.
     * The details of the offer.
     */
    public ?string $details;

    /**
     * Optional.
     * The fine print or terms of the offer, such as "20% off any t-shirt at Adam's Apparel.".
     */
    public ?string $finePrint;

    /**
     * Optional.
     * The help link for the offer, such as http://myownpersonaldomain.com/help.
     */
    public ?Uri $helpUri;

    /**
     * Optional.
     * Translated strings for the title. Recommended maximum length is 60 characters to ensure full
     * string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedTitle;

    /**
     * Optional.
     * Translated strings for the provider. Recommended maximum length is 12 characters to ensure full
     * string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedProvider;

    /**
     * Optional.
     * Translated strings for the details.
     */
    public ?LocalizedString $localizedDetails;

    /**
     * Optional.
     * Translated strings for the finePrint.
     */
    public ?LocalizedString $localizedFinePrint;

    /**
     * Optional.
     * A shortened version of the title of the offer, such as "20% off," shown to users as a quick reference
     * to the offer contents. Recommended maximum length is 20 characters.
     */
    #[MaxLength(20)]
    public ?string $shortTitle;

    /**
     * Optional.
     * Translated strings for the short title. Recommended maximum length is 20 characters.
     */
    public ?LocalizedString $localizedShortTitle;
}
