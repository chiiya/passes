<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MinItems;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class FieldSelector extends Component
{
    /**
     * Required.
     * If more than one reference is supplied, then the first one that references a non-empty field will be displayed.
     *
     * @var FieldReference[]
     */
    #[CastWith(ArrayCaster::class, FieldReference::class)]
    #[Required]
    #[MinItems(1)]
    public array $fields = [];
}
