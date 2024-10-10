<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\PredefinedItem;
use Symfony\Component\Validator\Constraints\Choice;

class TemplateItem extends Component
{
    public function __construct(
        /**
         * Optional.
         * A reference to a field to display.
         */
        public ?FieldSelector $firstValue = null,
        /**
         * Optional.
         * A reference to a field to display. This may only be populated if the firstValue field is populated.
         */
        public ?FieldSelector $secondValue = null,
        /**
         * Optional.
         * A predefined item to display. Only one of firstValue or predefinedItem may be set.
         */
        #[Choice([
            PredefinedItem::FLIGHT_NUMBER_AND_OPERATING_FLIGHT_NUMBER,
            PredefinedItem::FREQUENT_FLYER_PROGRAM_NAME_AND_NUMBER,
            PredefinedItem::PREDEFINED_ITEM_UNSPECIFIED,
        ])]
        #[Cast(LegacyValueCaster::class, PredefinedItem::class)]
        public ?string $predefinedItem = null,
    ) {
        parent::__construct();
    }
}
