<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Validation\HexColor;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\Money;
use Chiiya\Passes\Google\Components\EventTicket\EventReservationInfo;
use Chiiya\Passes\Google\Components\EventTicket\EventSeat;

class EventTicketObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'eventTicketObject';

    /**
     * Optional.
     * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
     */
    public ?EventTicketClass $classReference;

    /**
     * Optional.
     * Seating details for this ticket.
     */
    public ?EventSeat $seatInfo;

    /**
     * Optional.
     * Reservation details for this ticket. This is expected to be shared amongst all tickets that
     * were purchased in the same order.
     */
    public ?EventReservationInfo $reservationInfo;

    /**
     * Optional.
     * Name of the ticket holder, if the ticket is assigned to a person. E.g. "John Doe" or "Jane Doe".
     */
    public ?string $ticketHolderName;

    /**
     * Optional.
     * The number of the ticket. This can be a unique identifier across all tickets in an issuer's system,
     * all tickets for the event (e.g. XYZ1234512345), or all tickets in the order (1, 2, 3, etc.).
     */
    public ?string $ticketNumber;

    /**
     * Optional.
     * The type of the ticket, such as "Adult" or "Child", or "VIP" or "Standard".
     */
    public ?LocalizedString $ticketType;

    /**
     * Optional.
     * The face value of the ticket, matching what would be printed on a physical version of the ticket.
     */
    public ?Money $faceValue;

    /**
     * Optional.
     * A list of offer objects linked to this event ticket. The offer objects must already exist. Offer object IDs
     * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
     */
    public array $linkedOfferIds = [];

    /**
     * Optional.
     * The background color for the card. If not set the dominant color of the hero image is used, and if no hero
     * image is set, the dominant color of the logo is used. The format is #rrggbb where rrggbb is a hex RGB triplet,
     * such as #ffcc00. You can also use the shorthand version of the RGB triplet which is #rgb, such as #fc0.
     */
    #[HexColor]
    public ?string $hexBackgroundColor;
}
