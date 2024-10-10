<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class DetailsItemInfo extends Component
{
    public function __construct(
        /**
         * Required.
         * The item to be displayed in the details list.
         */
        public TemplateItem $item,
    ) {
        parent::__construct();
    }
}
