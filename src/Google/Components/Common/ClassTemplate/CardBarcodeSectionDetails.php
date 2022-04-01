<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class CardBarcodeSectionDetails extends Component
{
    /**
     * Optional.
     * Optional information to display above the barcode. If secondTopDetail is defined, this will be displayed
     * to the start side of this detail section.
     */
    public ?BarcodeSectionDetail $firstTopDetail;

    /**
     * Optional.
     * Optional information to display below the barcode.
     */
    public ?BarcodeSectionDetail $firstBottomDetail;

    /**
     * Optional.
     * Optional second piece of information to display above the barcode. If firstTopDetail is defined, this will be
     * displayed to the end side of this detail section.
     */
    public ?BarcodeSectionDetail $secondTopDetail;
}
