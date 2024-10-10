<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\EventTicket\EventDateTime;
use Chiiya\Passes\Google\Components\EventTicket\EventVenue;
use Chiiya\Passes\Google\Enumerators\EventTicket\ConfirmationCodeLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\GateLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\RowLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\SeatLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\SectionLabel;
use Symfony\Component\Validator\Constraints\Choice;

class EventTicketClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'eventTicketClass';

    public function __construct(
        /**
         * Required.
         * The name of the event, such as "LA Dodgers at SF Giants".
         */
        public LocalizedString $eventName,
        /**
         * Optional.
         * The fine print, terms, or conditions of the pass.
         */
        public ?LocalizedString $finePrint = null,
        /**
         * Optional.
         * The ID of the event. This ID should be unique for every event in an account. It is used to group tickets
         * together if the user has saved multiple tickets for the same event. It can be at most 64 characters.
         */
        public ?string $eventId = null,
        /**
         * Optional.
         * The logo image of the ticket. This image is displayed in the card detail view of the app.
         */
        public ?Image $logo = null,
        /**
         * Optional.
         * The wide logo of the ticket. When provided, this will be used in place of the logo in the top left of the card view.
         */
        public ?Image $wideLogo = null,
        /**
         * Optional.
         * Event venue details.
         */
        public ?EventVenue $venue = null,
        /**
         * Optional.
         * The date & time information of the event.
         */
        public ?EventDateTime $dateTime = null,
        /**
         * Optional.
         * The label to use for the confirmation code value on the card detail view.
         */
        #[Choice([
            ConfirmationCodeLabel::CONFIRMATION_CODE_LABEL_UNSPECIFIED,
            ConfirmationCodeLabel::CONFIRMATION_CODE,
            ConfirmationCodeLabel::CONFIRMATION_NUMBER,
            ConfirmationCodeLabel::ORDER_NUMBER,
            ConfirmationCodeLabel::RESERVATION_NUMBER,
        ])]
        #[Cast(LegacyValueCaster::class, ConfirmationCodeLabel::class)]
        public ?string $confirmationCodeLabel = null,
        /**
         * Optional.
         * A custom label to use for the confirmation code value on the card detail view.
         */
        public ?string $customConfirmationCodeLabel = null,
        /**
         * Optional.
         * The label to use for the seat value on the card detail view.
         */
        #[Choice([SeatLabel::SEAT, SeatLabel::SEAT_LABEL_UNSPECIFIED])]
        #[Cast(LegacyValueCaster::class, SeatLabel::class)]
        public ?string $seatLabel = null,
        /**
         * Optional.
         * A custom label to use for the seat value on the card detail view.
         */
        public ?string $customSeatLabel = null,
        /**
         * Optional.
         * The label to use for the row value on the card detail view.
         */
        #[Choice([RowLabel::ROW, RowLabel::ROW_LABEL_UNSPECIFIED])]
        #[Cast(LegacyValueCaster::class, RowLabel::class)]
        public ?string $rowLabel = null,
        /**
         * Optional.
         * A custom label to use for the row value on the card detail view.
         */
        public ?string $customRowLabel = null,
        /**
         * Optional.
         * The label to use for the section value on the card detail view.
         */
        #[Choice([SectionLabel::SECTION, SectionLabel::THEATER, SectionLabel::SECTION_LABEL_UNSPECIFIED])]
        #[Cast(LegacyValueCaster::class, SectionLabel::class)]
        public ?string $sectionLabel = null,
        /**
         * Optional.
         * A custom label to use for the section value on the card detail view.
         */
        public ?string $customSectionLabel = null,
        /**
         * Optional.
         * The label to use for the gate value on the card detail view.
         */
        #[Choice([GateLabel::GATE_LABEL_UNSPECIFIED, GateLabel::GATE, GateLabel::DOOR, GateLabel::ENTRANCE])]
        #[Cast(LegacyValueCaster::class, GateLabel::class)]
        public ?string $gateLabel = null,
        /**
         * Optional.
         * A custom label to use for the gate value on the card detail view.
         */
        public ?string $customGateLabel = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
