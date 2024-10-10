<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Transit\PurchaseDetails;
use Chiiya\Passes\Google\Components\Transit\TicketLeg;
use Chiiya\Passes\Google\Components\Transit\TicketRestrictions;
use Chiiya\Passes\Google\Enumerators\Transit\ConcessionCategory;
use Chiiya\Passes\Google\Enumerators\Transit\PassengerType;
use Chiiya\Passes\Google\Enumerators\Transit\TicketStatus;
use Chiiya\Passes\Google\Enumerators\Transit\TripType;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\CssColor;
use Symfony\Component\Validator\Constraints\NotBlank;

class TransitObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'transitObject';

    public function __construct(
        /**
         * Required.
         * The type of trip this transit object represents. Used to determine which symbol to use between
         * the origin and destination.
         */
        #[Choice([TripType::TRIP_TYPE_UNSPECIFIED, TripType::ROUND_TRIP, TripType::ONE_WAY])]
        #[Cast(LegacyValueCaster::class, TripType::class)]
        #[NotBlank]
        public string $tripType,
        /**
         * Optional.
         * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
         */
        public ?TransitClass $classReference = null,
        /**
         * Optional.
         * The number of the ticket. This is a unique identifier for the ticket in the transit operator's system.
         */
        public ?string $ticketNumber = null,
        /**
         * Optional.
         * The number of passengers.
         */
        #[Choice([
            PassengerType::PASSENGER_TYPE_UNSPECIFIED,
            PassengerType::SINGLE_PASSENGER,
            PassengerType::MULTIPLE_PASSENGERS,
        ])]
        #[Cast(LegacyValueCaster::class, PassengerType::class)]
        public ?string $passengerType = null,
        /**
         * Optional.
         * The name(s) of the passengers the ticket is assigned to. The above passengerType field is meant to
         * give Google context on this field.
         */
        public ?string $passengerNames = null,
        /**
         * Optional.
         * This id is used to group tickets together if the user has saved multiple tickets for the same trip.
         */
        public ?string $tripId = null,
        /**
         * Optional.
         * The status of the ticket. For states which affect display, use the state field instead.
         */
        #[Choice([
            TicketStatus::TICKET_STATUS_UNSPECIFIED,
            TicketStatus::USED,
            TicketStatus::REFUNDED,
            TicketStatus::EXCHANGED,
        ])]
        #[Cast(LegacyValueCaster::class, TicketStatus::class)]
        public ?string $ticketStatus = null,
        /**
         * Optional.
         * A custom status to use for the ticket status value when ticketStatus does not provide the
         * right option. Both ticketStatus and customTicketStatus may not be set.
         */
        public ?LocalizedString $customTicketStatus = null,
        /**
         * Optional.
         * The concession category for the ticket.
         */
        #[Choice([
            ConcessionCategory::CONCESSION_CATEGORY_UNSPECIFIED,
            ConcessionCategory::ADULT,
            ConcessionCategory::CHILD,
            ConcessionCategory::SENIOR,
        ])]
        #[Cast(LegacyValueCaster::class, ConcessionCategory::class)]
        public ?string $concessionCategory = null,
        /**
         * Optional.
         * A custom concession category to use when concessionCategory does not provide the right option.
         * Both concessionCategory and customConcessionCategory may not be set.
         */
        public ?LocalizedString $customConcessionCategory = null,
        /**
         * Optional.
         * Information about what kind of restrictions there are on using this ticket. For example,
         * which days of the week it must be used, or which routes are allowed to be taken.
         */
        public ?TicketRestrictions $ticketRestrictions = null,
        /**
         * Optional.
         * Purchase details for this ticket.
         */
        public ?PurchaseDetails $purchaseDetails = null,
        /**
         * Optional.
         * A single ticket leg contains departure and arrival information along with boarding and seating
         * information. If more than one leg is to be specified then use the ticketLegs field instead.
         * Both ticketLeg and ticketLegs may not be set.
         */
        public ?TicketLeg $ticketLeg = null,
        /**
         * Optional.
         * Each ticket may contain one or more legs. Each leg contains departure and arrival information along
         * with boarding and seating information. If only one leg is to be specified then use the ticketLeg field
         * instead. Both ticketLeg and ticketLegs may not be set.
         *
         * @var TicketLeg[]
         */
        #[Cast(ArrayCaster::class, TicketLeg::class)]
        public array $ticketLegs = [],
        /**
         * Optional.
         * The background color for the card. If not set the dominant color of the hero image is used, and if no
         * hero image is set, the dominant color of the logo is used.
         */
        #[CssColor(formats: [CssColor::HEX_LONG, CssColor::HEX_SHORT])]
        public ?string $hexBackgroundColor = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
