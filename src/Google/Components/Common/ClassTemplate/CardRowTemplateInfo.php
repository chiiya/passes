<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class CardRowTemplateInfo extends Component
{
    /**
     * Optional.
     * Template for a row containing one item. Exactly one of "oneItem", "twoItems", "threeItems" must be set.
     */
    public ?CardRowItem $oneItem;

    /**
     * Optional.
     * Template for a row containing two items. Exactly one of "oneItem", "twoItems", "threeItems" must be set.
     */
    public ?CardRowItem $twoItems;

    /**
     * Optional.
     * Template for a row containing three items. Exactly one of "oneItem", "twoItems", "threeItems" must be set.
     */
    public ?CardRowItem $threeItems;
}
