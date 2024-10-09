<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\TransitOption;
use Symfony\Component\Validator\Constraints\Choice;

class FirstRowOption extends Component
{
    public function __construct(
        /** Optional. */
        #[Choice([
            TransitOption::ORIGIN_AND_DESTINATION_CODES,
            TransitOption::ORIGIN_AND_DESTINATION_NAMES,
            TransitOption::ORIGIN_NAME,
            TransitOption::TRANSIT_OPTION_UNSPECIFIED,
        ])]
        #[Cast(LegacyValueCaster::class, TransitOption::class)]
        public ?string $transitOption = null,
        /** Optional. */
        public ?FieldSelector $fieldOption = null,
    ) {
        parent::__construct();
    }
}
