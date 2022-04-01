<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class Seat extends Component
{
    /**
     * Optional.
     * A description of the seat, such as “A flat bed seat”.
     */
    public ?string $seatDescription;

    /**
     * Optional.
     * The identifier code for the seat.
     */
    public ?string $seatIdentifier;

    /**
     * Optional.
     * The number of the seat.
     */
    public ?string $seatNumber;

    /**
     * Optional.
     * The row that contains the seat.
     */
    public ?string $seatRow;

    /**
     * Optional.
     * The section that contains the seat.
     */
    public ?string $seatSection;

    /**
     * Optional.
     * The type of seat, such as “Reserved seating”.
     */
    public ?string $seatType;
}
