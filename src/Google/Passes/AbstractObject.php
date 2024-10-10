<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\AppLinkData;
use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\GroupingInfo;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\RotatingBarcode;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Components\Common\TimeInterval;
use Chiiya\Passes\Google\Enumerators\State;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

class AbstractObject extends Component
{
    public function __construct(
        /**
         * Required.
         * The unique identifier for an object. This ID must be unique across all objects from an issuer. This value
         * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
         */
        #[NotBlank]
        public string $id,
        /**
         * Required.
         * The class associated with this object. The class must be of the same type as this object, must already exist,
         * and must be approved. Class IDs should follow the format issuer ID.identifier where the former is issued by
         * Google and latter is chosen by you.
         */
        #[NotBlank]
        public string $classId,
        /**
         * Required.
         * The state of the object. This field is used to determine how an object is displayed in the app.
         */
        #[Choice([State::STATE_UNSPECIFIED, State::ACTIVE, State::COMPLETED, State::EXPIRED, State::INACTIVE])]
        #[Cast(LegacyValueCaster::class, State::class)]
        #[NotBlank]
        public string $state,
        /**
         * Optional.
         * The barcode type and value.
         */
        public ?Barcode $barcode = null,
        /**
         * Optional.
         * The time period this object will be active and object can be used. An object's state will be changed to
         * expired when this time period has passed.
         */
        public ?TimeInterval $validTimeInterval = null,
        /**
         * Optional.
         * Available only to Smart Tap enabled partners. Contact support for additional guidance.
         */
        public ?string $smartTapRedemptionValue = null,
        /**
         * Optional.
         * Grouping info for event tickets.
         */
        public ?GroupingInfo $groupingInfo = null,
        /**
         * Optional.
         * Image module data. The maximum number of these fields displayed is 1 from object level and 1 for
         * class object level.
         *
         * @var ImageModuleData[]
         */
        #[Cast(ArrayCaster::class, ImageModuleData::class)]
        #[Count(max: 1)]
        public array $imageModulesData = [],
        /**
         * Optional.
         * Text module data. If text module data is also defined on the class, both will be displayed. The maximum
         * number of these fields displayed is 10 from the object and 10 from the class.
         *
         * @var TextModuleData[]
         */
        #[Cast(ArrayCaster::class, TextModuleData::class)]
        #[Count(max: 10)]
        public array $textModulesData = [],
        /**
         * Optional.
         * Links module data. If links module data is also defined on the class, both will be displayed.
         */
        public ?LinksModuleData $linksModuleData = null,
        /**
         * Optional.
         * Optional information about the partner app link.
         */
        public ?AppLinkData $appLinkData = null,
        /**
         * Optional.
         * Optional banner image displayed on the front of the card. If none is present, hero image of the class,
         * if present, will be displayed. If hero image of the class is also not present, nothing will be displayed.
         */
        public ?Image $heroImage = null,
        /**
         * Optional
         * The rotating barcode settings/details.
         */
        public ?RotatingBarcode $rotatingBarcode = null,
        /**
         * Optional.
         * Indicates if the object has users. This field is set by the platform.
         */
        public ?bool $hasUsers = null,
    ) {
        parent::__construct();
    }
}
