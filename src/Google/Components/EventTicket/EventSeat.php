<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;

class EventSeat extends Component
{
    /**
     * Optional.
     * The seat number, such as "1", "2", "3", or any other seat identifier.
     */
    public ?LocalizedString $seat;

    /**
     * Optional.
     * The row of the seat, such as "1", E", "BB", or "A5".
     */
    public ?LocalizedString $row;

    /**
     * Optional.
     * The section of the seat, such as "121".
     */
    public ?LocalizedString $section;

    /**
     * Optional.
     * The gate the ticket holder should enter to get to their seat, such as "A" or "West".
     */
    public ?LocalizedString $gate;
}
