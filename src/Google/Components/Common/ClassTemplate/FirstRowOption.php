<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\TransitOption;
use Spatie\DataTransferObject\Attributes\CastWith;

class FirstRowOption extends Component
{
    /** Optional. */
    #[ValueIn([
        TransitOption::ORIGIN_AND_DESTINATION_CODES,
        TransitOption::ORIGIN_AND_DESTINATION_NAMES,
        TransitOption::ORIGIN_NAME,
        TransitOption::TRANSIT_OPTION_UNSPECIFIED,
    ])]
    #[CastWith(LegacyValueCaster::class, TransitOption::class)]
    public ?string $transitOption;

    /** Optional. */
    public ?FieldSelector $fieldOption;
}
