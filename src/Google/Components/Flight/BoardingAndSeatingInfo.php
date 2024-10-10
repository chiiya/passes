<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Flight;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\Flight\BoardingDoor;
use Symfony\Component\Validator\Constraints\Choice;

class BoardingAndSeatingInfo extends Component
{
    public function __construct(
        /**
         * Optional.
         * The value of boarding group (or zone) this passenger shall board with.
         */
        public ?string $boardingGroup = null,
        /**
         * Optional.
         * The value of passenger seat. If there is no specific identifier, use seatAssignment instead.
         */
        public ?string $seatNumber = null,
        /**
         * Optional.
         * The value of the seat class, eg: "Economy" or "Economy Plus".
         */
        public ?string $seatClass = null,
        /**
         * Optional.
         * A small image shown above the boarding barcode. Airlines can use it to communicate any special
         * boarding privileges.
         */
        public ?Image $boardingPrivilegeImage = null,
        /**
         * Optional.
         * The value of boarding position, e.g. "76".
         */
        public ?string $boardingPosition = null,
        /**
         * Optional.
         * The sequence number on the boarding pass. This usually matches the sequence in which the passengers
         * checked in. Airline might use the number for manual boarding and bag tags.
         */
        public ?string $sequenceNumber = null,
        /**
         * Optional.
         * Set this field only if this flight boards through more than one door or bridge and you want to explicitly
         * print the door location on the boarding pass. Most airlines route their passengers to the right door or bridge
         * by refering to doors/bridges by the seatClass. In those cases boardingDoor should not be set.
         */
        #[Choice([BoardingDoor::BACK, BoardingDoor::FRONT, BoardingDoor::BOARDING_DOOR_UNSPECIFIED])]
        #[Cast(LegacyValueCaster::class, BoardingDoor::class)]
        public ?string $boardingDoor = null,
        /**
         * Optional.
         * The passenger's seat assignment. To be used when there is no specific identifier to use in seatNumber.
         */
        public ?LocalizedString $seatAssignment = null,
    ) {
        parent::__construct();
    }
}
