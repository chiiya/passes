<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;

class Seat extends Component
{
    public function __construct(
        /**
         * Optional.
         * A description of the seat, such as “A flat bed seat”.
         */
        public ?string $seatDescription = null,
        /**
         * Optional.
         * The identifier code for the seat.
         */
        public ?string $seatIdentifier = null,
        /**
         * Optional.
         * The number of the seat.
         */
        public ?string $seatNumber = null,
        /**
         * Optional.
         * The row that contains the seat.
         */
        public ?string $seatRow = null,
        /**
         * Optional.
         * The section that contains the seat.
         */
        public ?string $seatSection = null,
        /**
         * Optional.
         * The type of seat, such as “Reserved seating”.
         */
        public ?string $seatType = null,
    ) {
        parent::__construct();
    }
}
