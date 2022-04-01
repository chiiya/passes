<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class ListTemplateOverride extends Component
{
    /**
     * Optional.
     * Specifies from a predefined set of options what the will be displayed in the first row.
     */
    public ?FirstRowOption $firstRowOption;

    /**
     * Optional.
     * A reference to the field to be displayed in the second row.
     */
    public ?FieldSelector $secondRowOption;

    /**
     * Optional.
     * A reference to the field to be displayed in the third row.
     *
     * @deprecated
     */
    public ?FieldSelector $thirdRowOption;
}
