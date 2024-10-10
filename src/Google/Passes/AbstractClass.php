<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\CallbackOptions;
use Chiiya\Passes\Google\Components\Common\ClassTemplate\ClassTemplateInfo;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\SecurityAnimation;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Enumerators\MultipleDevicesAndHoldersAllowedStatus;
use Chiiya\Passes\Google\Enumerators\ViewUnlockRequirement;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

abstract class AbstractClass extends Component
{
    public function __construct(
        /**
         * Required.
         * The unique identifier for a class. This ID must be unique across all classes from an issuer. This value
         * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
         */
        #[NotBlank]
        public string $id,
        /**
         * Optional.
         * Template information about how the class should be displayed. If unset, Google will fall back to a default
         * set of fields to display.
         */
        public ?ClassTemplateInfo $classTemplateInfo = null,
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
         * Text module data. If text module data is also defined on the class, both will be displayed. The
         * maximum number of these fields displayed is 10 from the object and 10 from the class.
         *
         * @var TextModuleData[]
         */
        #[Cast(ArrayCaster::class, TextModuleData::class)]
        #[Count(max: 10)]
        public array $textModulesData = [],
        /**
         * Optional.
         * Links module data. If links module data is also defined on the object, both will be displayed.
         */
        public ?LinksModuleData $linksModuleData = null,
        /**
         * Optional.
         * Available only to Smart Tap enabled partners. Contact support for additional guidance.
         */
        public ?bool $enableSmartTap = null,
        /**
         * Optional.
         * Available only to Smart Tap enabled partners. Contact support for additional guidance.
         */
        public array $redemptionIssuers = [],
        /**
         * Optional
         * If this is set a security animation will be rendered on pass details.
         */
        public ?SecurityAnimation $securityAnimation = null,
        /**
         * Optional.
         * Identifies whether multiple users and devices will save the same object referencing this class.
         */
        #[Choice([
            MultipleDevicesAndHoldersAllowedStatus::STATUS_UNSPECIFIED,
            MultipleDevicesAndHoldersAllowedStatus::MULTIPLE_HOLDERS,
            MultipleDevicesAndHoldersAllowedStatus::ONE_USER_ALL_DEVICES,
            MultipleDevicesAndHoldersAllowedStatus::ONE_USER_ONE_DEVICE,
        ])]
        #[Cast(LegacyValueCaster::class, MultipleDevicesAndHoldersAllowedStatus::class)]
        public ?string $multipleDevicesAndHoldersAllowedStatus = null,
        /**
         * Optional.
         * Callback options to be used to call the issuer back for every save/delete of an object for this class by
         * the end-user. All objects of this class are eligible for the callback.
         */
        public ?CallbackOptions $callbackOptions = null,
        /**
         * Optional
         * Defines what unlock mechanism, if any, is required to view the card.
         */
        #[Choice([
            ViewUnlockRequirement::VIEW_UNLOCK_REQUIREMENT_UNSPECIFIED,
            ViewUnlockRequirement::UNLOCK_NOT_REQUIRED,
            ViewUnlockRequirement::UNLOCK_REQUIRED_TO_VIEW,
        ])]
        protected ?string $viewUnlockRequirement = null,
    ) {
        parent::__construct();
    }
}
