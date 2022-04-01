<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class BarcodeSectionDetail extends Component
{
    /**
     * Required.
     * A reference to an existing text-based or image field to display.
     */
    #[Required]
    public ?FieldSelector $fieldSelector;
}
