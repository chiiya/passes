<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class ClassTemplateInfo extends Component
{
    public function __construct(
        /**
         * Optional.
         * Specifies extra information to be displayed above and below the barcode.
         */
        public ?CardBarcodeSectionDetails $cardBarcodeSectionDetails = null,
        /**
         * Optional.
         * Override for the card view.
         */
        public ?CardTemplateOverride $cardTemplateOverride = null,
        /**
         * Optional.
         * Override for the details view (beneath the card view).
         */
        public ?DetailsTemplateOverride $detailsTemplateOverride = null,
        /**
         * Optional.
         * Override for the passes list view.
         */
        public ?ListTemplateOverride $listTemplateOverride = null,
    ) {
        parent::__construct();
    }
}
