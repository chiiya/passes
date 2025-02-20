<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LatLongPoint;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Message;
use Chiiya\Passes\Google\Components\Common\Review;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\ReviewStatus;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\CssColor;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

abstract class BaseClass extends AbstractClass
{
    public function __construct(
        /**
         * Required.
         * The status of the class.
         */
        #[NotBlank]
        #[Choice([
            ReviewStatus::REVIEW_STATUS_UNSPECIFIED,
            ReviewStatus::UNDER_REVIEW,
            ReviewStatus::APPROVED,
            ReviewStatus::REJECTED,
            ReviewStatus::DRAFT,
        ])]
        #[Cast(LegacyValueCaster::class, ReviewStatus::class)]
        public string $reviewStatus,
        /**
         * Required when creating.
         * The issuer name. Recommended maximum length is 20 characters to ensure full string is displayed on
         * smaller screens.
         */
        #[Length(max: 20)]
        public ?string $issuerName = null,
        /**
         * Optional.
         * An array of messages displayed in the app. All users of this object will receive its associated messages.
         * The maximum number of these fields is 10.
         *
         * @var Message[]
         */
        #[Cast(ArrayCaster::class, Message::class)]
        #[Count(max: 10)]
        public array $messages = [],
        /**
         * Optional.
         * The URI of your application's home page.
         */
        public ?Uri $homepageUri = null,
        /**
         * Optional.
         * List of locations.
         *
         * @var LatLongPoint[]
         */
        #[Cast(ArrayCaster::class, LatLongPoint::class)]
        #[Count(max: 20)]
        public array $locations = [],
        /**
         * Optional.
         * The review comments set by the platform when a class is marked approved or rejected.
         */
        public ?Review $review = null,
        /**
         * Optional.
         * Country code used to display the card's country (when the user is not in that country), as well
         * as to display localized content when content is not available in the user's locale.
         */
        public ?string $countryCode = null,
        /**
         * Optional.
         * Optional banner image displayed on the front of the card. If none is present, nothing will be displayed.
         * The image will display at 100% width.
         */
        public ?Image $heroImage = null,
        /**
         * Optional.
         * The background color for the card. If not set the dominant color of the hero image is used, and if no hero
         * image is set, the dominant color of the logo is used. The format is #rrggbb where rrggbb is a hex RGB triplet,
         * such as #ffcc00. You can also use the shorthand version of the RGB triplet which is #rgb, such as #fc0.
         */
        #[CssColor(formats: [CssColor::HEX_LONG, CssColor::HEX_SHORT])]
        public ?string $hexBackgroundColor = null,
        /**
         * Optional.
         * Translated strings for the issuerName. Recommended maximum length is 20 characters to ensure full string
         * is displayed on smaller screens.
         */
        public ?LocalizedString $localizedIssuerName = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
