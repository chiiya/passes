<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;

class CardRowItem extends Component
{
    /**
     * Optional.
     * The item to be displayed in the row. This item will be automatically centered.
     * Used for 1-ITEM-ROW.
     */
    public ?TemplateItem $item;

    /**
     * Optional.
     * The item to be displayed at the start of the row. This item will be aligned to the left.
     * Used for 2-ITEM-ROW and 3-ITEM-ROW.
     */
    public ?TemplateItem $startItem;

    /**
     * Optional.
     * The item to be displayed at the end of the row. This item will be aligned to the right.
     * Used for 3-ITEM-ROW.
     */
    public ?TemplateItem $middleItem;

    /**
     * Optional.
     * The item to be displayed at the end of the row. This item will be aligned to the right.
     * Used for 2-ITEM-ROW and 3-ITEM-ROW.
     */
    public ?TemplateItem $endItem;
}
