<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class BarcodeSectionDetail extends Component
{
    public function __construct(
        /**
         * Required.
         * A reference to an existing text-based or image field to display.
         */
        public FieldSelector $fieldSelector,
    ) {
        parent::__construct();
    }
}
