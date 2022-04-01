<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Component;

class GroupingInfo extends Component
{
    /**
     * Optional.
     * Optional index for sorting the passes when they are grouped with other passes. Passes with lower sort index
     * are shown before passes with higher sort index. If unspecified, the value is assumed to be INT_MAX. For two
     * passes with same sort index, the sorting behavior is undefined.
     */
    public ?int $sortIndex;
}
