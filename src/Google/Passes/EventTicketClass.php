<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\EventTicket\EventDateTime;
use Chiiya\Passes\Google\Components\EventTicket\EventVenue;
use Chiiya\Passes\Google\Enumerators\EventTicket\ConfirmationCodeLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\GateLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\RowLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\SeatLabel;
use Chiiya\Passes\Google\Enumerators\EventTicket\SectionLabel;
use Spatie\DataTransferObject\Attributes\CastWith;

class EventTicketClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'eventTicketClass';

    /**
     * Optional.
     * The fine print, terms, or conditions of the pass.
     */
    public ?LocalizedString $finePrint;

    /**
     * Required.
     * The name of the event, such as "LA Dodgers at SF Giants".
     */
    #[Required]
    public ?LocalizedString $eventName;

    /**
     * Optional.
     * The ID of the event. This ID should be unique for every event in an account. It is used to group tickets
     * together if the user has saved multiple tickets for the same event. It can be at most 64 characters.
     */
    public ?string $eventId;

    /**
     * Optional.
     * The logo image of the ticket. This image is displayed in the card detail view of the app.
     */
    public ?Image $logo;

    /**
     * Optional.
     * Event venue details.
     */
    public ?EventVenue $venue;

    /**
     * Optional.
     * The date & time information of the event.
     */
    public ?EventDateTime $dateTime;

    /**
     * Optional.
     * The label to use for the confirmation code value on the card detail view.
     */
    #[ValueIn([
        ConfirmationCodeLabel::CONFIRMATION_CODE_LABEL_UNSPECIFIED,
        ConfirmationCodeLabel::CONFIRMATION_CODE,
        ConfirmationCodeLabel::CONFIRMATION_NUMBER,
        ConfirmationCodeLabel::ORDER_NUMBER,
        ConfirmationCodeLabel::RESERVATION_NUMBER,
    ])]
    #[CastWith(LegacyValueCaster::class, ConfirmationCodeLabel::class)]
    public ?string $confirmationCodeLabel;

    /**
     * Optional.
     * A custom label to use for the confirmation code value on the card detail view.
     */
    public ?string $customConfirmationCodeLabel;

    /**
     * Optional.
     * The label to use for the seat value on the card detail view.
     */
    #[ValueIn([SeatLabel::SEAT, SeatLabel::SEAT_LABEL_UNSPECIFIED])]
    #[CastWith(LegacyValueCaster::class, SeatLabel::class)]
    public ?string $seatLabel;

    /**
     * Optional.
     * A custom label to use for the seat value on the card detail view.
     */
    public ?string $customSeatLabel;

    /**
     * Optional.
     * The label to use for the row value on the card detail view.
     */
    #[ValueIn([RowLabel::ROW, RowLabel::ROW_LABEL_UNSPECIFIED])]
    #[CastWith(LegacyValueCaster::class, RowLabel::class)]
    public ?string $rowLabel;

    /**
     * Optional.
     * A custom label to use for the row value on the card detail view.
     */
    public ?string $customRowLabel;

    /**
     * Optional.
     * The label to use for the section value on the card detail view.
     */
    #[ValueIn([SectionLabel::SECTION, SectionLabel::THEATER, SectionLabel::SECTION_LABEL_UNSPECIFIED])]
    #[CastWith(LegacyValueCaster::class, SectionLabel::class)]
    public ?string $sectionLabel;

    /**
     * Optional.
     * A custom label to use for the section value on the card detail view.
     */
    public ?string $customSectionLabel;

    /**
     * Optional.
     * The label to use for the gate value on the card detail view.
     */
    #[ValueIn([GateLabel::GATE_LABEL_UNSPECIFIED, GateLabel::GATE, GateLabel::DOOR, GateLabel::ENTRANCE])]
    #[CastWith(LegacyValueCaster::class, GateLabel::class)]
    public ?string $gateLabel;

    /**
     * Optional.
     * A custom label to use for the gate value on the card detail view.
     */
    public ?string $customGateLabel;
}
