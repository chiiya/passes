<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\HexColor;
use Chiiya\Passes\Common\Validation\MaxItems;
use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\CallbackOptions;
use Chiiya\Passes\Google\Components\Common\ClassTemplate\ClassTemplateInfo;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LatLongPoint;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Message;
use Chiiya\Passes\Google\Components\Common\Review;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\MultipleDevicesAndHoldersAllowedStatus;
use Chiiya\Passes\Google\Enumerators\ReviewStatus;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

abstract class BaseClass extends Component
{
    /**
     * Optional.
     * Template information about how the class should be displayed. If unset, Google will fallback to a default
     * set of fields to display.
     */
    public ?ClassTemplateInfo $classTemplateInfo;

    /**
     * Required.
     * The unique identifier for a class. This ID must be unique across all classes from an issuer. This value
     * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
     */
    #[Required]
    public ?string $id;

    /**
     * Required.
     * The issuer name. Recommended maximum length is 20 characters to ensure full string is displayed on
     * smaller screens.
     */
    #[Required]
    #[MaxLength(20)]
    public ?string $issuerName;

    /**
     * Optional.
     * An array of messages displayed in the app. All users of this object will receive its associated messages.
     * The maximum number of these fields is 10.
     *
     * @var Message[]
     */
    #[CastWith(ArrayCaster::class, Message::class)]
    #[MaxItems(10)]
    public array $messages = [];

    /**
     * Optional.
     * The URI of your application's home page.
     */
    public ?Uri $homepageUri;

    /**
     * Optional.
     * List of locations.
     *
     * @var LatLongPoint[]
     */
    #[CastWith(ArrayCaster::class, LatLongPoint::class)]
    #[MaxItems(20)]
    public array $locations = [];

    /**
     * Required.
     * The status of the class.
     */
    #[Required]
    #[ValueIn([
        ReviewStatus::REVIEW_STATUS_UNSPECIFIED,
        ReviewStatus::UNDER_REVIEW,
        ReviewStatus::APPROVED,
        ReviewStatus::REJECTED,
        ReviewStatus::DRAFT,
    ])]
    #[CastWith(LegacyValueCaster::class, ReviewStatus::class)]
    public ?string $reviewStatus;

    /**
     * Optional.
     * The review comments set by the platform when a class is marked approved or rejected.
     */
    public ?Review $review;

    /**
     * Optional.
     * Image module data. The maximum number of these fields displayed is 1 from object level and 1 for
     * class object level.
     *
     * @var ImageModuleData[]
     */
    #[CastWith(ArrayCaster::class, ImageModuleData::class)]
    #[MaxItems(1)]
    public array $imageModulesData = [];

    /**
     * Optional.
     * Text module data. If text module data is also defined on the class, both will be displayed. The
     * maximum number of these fields displayed is 10 from the object and 10 from the class.
     *
     * @var TextModuleData[]
     */
    #[CastWith(ArrayCaster::class, TextModuleData::class)]
    #[MaxItems(10)]
    public array $textModulesData = [];

    /**
     * Optional.
     * Links module data. If links module data is also defined on the object, both will be displayed.
     */
    public ?LinksModuleData $linksModuleData;

    /**
     * Optional.
     * Available only to Smart Tap enabled partners. Contact support for additional guidance.
     */
    public array $redemptionIssuers = [];

    /**
     * Optional.
     * Country code used to display the card's country (when the user is not in that country), as well
     * as to display localized content when content is not available in the user's locale.
     */
    public ?string $countryCode;

    /**
     * Optional.
     * Optional banner image displayed on the front of the card. If none is present, nothing will be displayed.
     * The image will display at 100% width.
     */
    public ?Image $heroImage;

    /**
     * Optional.
     * Available only to Smart Tap enabled partners. Contact support for additional guidance.
     */
    public ?bool $enableSmartTap;

    /**
     * Optional.
     * The background color for the card. If not set the dominant color of the hero image is used, and if no hero
     * image is set, the dominant color of the logo is used. The format is #rrggbb where rrggbb is a hex RGB triplet,
     * such as #ffcc00. You can also use the shorthand version of the RGB triplet which is #rgb, such as #fc0.
     */
    #[HexColor]
    public ?string $hexBackgroundColor;

    /**
     * Optional.
     * Translated strings for the issuerName. Recommended maximum length is 20 characters to ensure full string
     * is displayed on smaller screens.
     */
    public ?LocalizedString $localizedIssuerName;

    /**
     * Optional.
     * Identifies whether multiple users and devices will save the same object referencing this class.
     */
    #[ValueIn([
        MultipleDevicesAndHoldersAllowedStatus::STATUS_UNSPECIFIED,
        MultipleDevicesAndHoldersAllowedStatus::MULTIPLE_HOLDERS,
        MultipleDevicesAndHoldersAllowedStatus::ONE_USER_ALL_DEVICES,
        MultipleDevicesAndHoldersAllowedStatus::ONE_USER_ONE_DEVICE,
    ])]
    #[CastWith(LegacyValueCaster::class, MultipleDevicesAndHoldersAllowedStatus::class)]
    public ?string $multipleDevicesAndHoldersAllowedStatus;

    /**
     * Optional.
     * Callback options to be used to call the issuer back for every save/delete of an object for this class by
     * the end-user. All objects of this class are eligible for the callback.
     */
    public ?CallbackOptions $callbackOptions;
}
