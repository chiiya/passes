<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class DetailsItemInfo extends Component
{
    /**
     * Required.
     * The item to be displayed in the details list.
     */
    #[Required]
    public ?TemplateItem $item;
}
