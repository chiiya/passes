<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Apple\Enumerators\EventType;
use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Common\Component;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Type;

class Semantics extends Component
{
    public function __construct(
        /**
         * Optional.
         * The IATA airline code, such as “EX” for flightCode “EX123”. Use this key only for airline boarding passes.
         */
        public ?string $airlineCode = null,
        /**
         * Optional.
         * An array of the Apple Music persistent ID for each artist performing at the event, in decreasing order of significance.
         * Use this key for any type of event ticket.
         *
         * @var null|string[]
         */
        public ?array $artistIDs = null,
        /**
         * Optional.
         * The unique abbreviation of the away team’s name. Use this key only for a sports event ticket.
         */
        public ?string $awayTeamAbbreviation = null,
        /**
         * Optional.
         * The home location of the away team. Use this key only for a sports event ticket.
         */
        public ?string $awayTeamLocation = null,
        /**
         * Optional.
         * The name of the away team. Use this key only for a sports event ticket.
         */
        public ?string $awayTeamName = null,
        /**
         * Optional.
         * The current balance redeemable with the pass. Use this key only for a store card pass.
         */
        public ?CurrencyAmount $balance = null,
        /**
         * Optional.
         * A group number for boarding. Use this key for any type of boarding pass.
         */
        public ?string $boardingGroup = null,
        /**
         * Optional.
         * A sequence number for boarding. Use this key for any type of boarding pass.
         */
        public ?string $boardingSequenceNumber = null,
        /**
         * Optional.
         * The number of the passenger car. A train car is also called a carriage,
         * wagon, coach, or bogie in some countries. Use this key only for a train or other
         * rail boarding pass.
         */
        public ?string $carNumber = null,
        /**
         * Optional.
         * A booking or reservation confirmation number. Use this key for any type of boarding pass.
         */
        public ?string $confirmationNumber = null,
        /**
         * Optional.
         * The IATA airport code for the departure airport, such as “MPM” or “LHR”. Use
         * this key only for airline boarding passes.
         */
        public ?string $departureAirportCode = null,
        /**
         * Optional.
         * The full name of the departure airport, such as “Maputo International Airport”. Use
         * this key only for airline boarding passes.
         */
        public ?string $departureAirportName = null,
        /**
         * Optional.
         * The gate number or letters of the departure gate, such as “1A”. Do not include the word “Gate.”.
         */
        public ?string $departureGate = null,
        /**
         * Optional.
         * An object that represents the geographic coordinates of the transit departure location,
         * suitable for display on a map. If possible, use precise locations, which are more useful
         * to travelers; for example, the specific location of an airport gate. Use this key for any
         * type of boarding pass.
         */
        public ?SemanticLocation $departureLocation = null,
        /**
         * Optional.
         * A brief description of the departure location. For example, for a flight departing from
         * an airport whose code is “LHR,” an appropriate description might be “London, Heathrow“. Use
         * this key for any type of boarding pass.
         */
        public ?string $departureLocationDescription = null,
        /**
         * Optional.
         * The name of the departure platform, such as “A”. Don’t include the word “Platform.” Use
         * this key only for a train or other rail boarding pass.
         */
        public ?string $departurePlatform = null,
        /**
         * Optional.
         * The name of the departure station, such as “1st Street Station”. Use this key only for
         * a train or other rail boarding pass.
         */
        public ?string $departureStationName = null,
        /**
         * Optional.
         * The name or letter of the departure terminal, such as “A”. Don’t include the word
         * “Terminal.” Use this key only for airline boarding passes.
         */
        public ?string $departureTerminal = null,
        /**
         * Optional.
         * The IATA airport code for the destination airport, such as “MPM” or “LHR”. Use this
         * key only for airline boarding passes.
         */
        public ?string $destinationAirportCode = null,
        /**
         * Optional.
         * The full name of the destination airport, such as “London Heathrow”. Use this key
         * only for airline boarding passes.
         */
        public ?string $destinationAirportName = null,
        /**
         * Optional.
         * The gate number or letter of the destination gate, such as “1A”. Don’t include the
         * word “Gate.” Use this key only for airline boarding passes.
         */
        public ?string $destinationGate = null,
        /**
         * Optional.
         * An object that represents the geographic coordinates of the transit departure location,
         * suitable for display on a map. Use this key for any type of boarding pass.
         */
        public ?SemanticLocation $destinationLocation = null,
        /**
         * Optional.
         * A brief description of the destination location. For example, for a flight arriving at an
         * airport whose code is “MPM,” “Maputo“ might be an appropriate description. Use this
         * key for any type of boarding pass.
         */
        public ?string $destinationLocationDescription = null,
        /**
         * Optional.
         * The name of the destination platform, such as “A”. Don’t include the word “Platform.”
         * Use this key only for a train or other rail boarding pass.
         */
        public ?string $destinationPlatform = null,
        /**
         * Optional.
         * The name of the destination station, such as “1st Street Station”. Use this key only
         * for a train or other rail boarding pass.
         */
        public ?string $destinationStationName = null,
        /**
         * Optional.
         * The terminal name or letter of the destination terminal, such as “A”. Don’t include
         * the word “Terminal.” Use this key only for airline boarding passes.
         */
        public ?string $destinationTerminal = null,
        /**
         * Optional.
         * The duration of the event or transit journey, in seconds. Use this key for any
         * type of boarding pass and any type of event ticket.
         */
        public ?int $duration = null,
        /**
         * Optional.
         * The full name of the event, such as the title of a movie. Use this key for any
         * type of event ticket.
         */
        public ?string $eventName = null,
        /**
         * Optional.
         * The type of event. Use this key for any type of event ticket.
         */
        #[Choice([
            EventType::GENERIC,
            EventType::LIVE_PERFORMANCE,
            EventType::MOVIE,
            EventType::SPORTS,
            EventType::CONFERENCE,
            EventType::CONVENTION,
            EventType::WORKSHOP,
            EventType::SOCIAL_GATHERING,
        ])]
        public ?string $eventType = null,
        /**
         * Optional.
         * The IATA flight code, such as “EX123”. Use this key only for airline boarding passes.
         */
        public ?string $flightCode = null,
        /**
         * Optional.
         * The numeric portion of the IATA flight code, such as 123 for flightCode “EX123”.
         * Use this key only for airline boarding passes.
         */
        public ?int $flightNumber = null,
        /**
         * Optional.
         * The genre of the performance, such as “Classical”. Use this key for any type of event ticket.
         */
        public ?string $genre = null,
        /**
         * Optional.
         * The unique abbreviation of the home team’s name. Use this key only for a sports event ticket.
         */
        public ?string $homeTeamAbbreviation = null,
        /**
         * Optional.
         * The home location of the home team. Use this key only for a sports event ticket.
         */
        public ?string $homeTeamLocation = null,
        /**
         * Optional.
         * The name of the home team. Use this key only for a sports event ticket.
         */
        public ?string $homeTeamName = null,
        /**
         * Optional.
         * The abbreviated league name for a sports event. Use this key only for a sports event ticket.
         */
        public ?string $leagueAbbreviation = null,
        /**
         * Optional.
         * The unabbreviated league name for a sports event. Use this key only for a sports event ticket.
         */
        public ?string $leagueName = null,
        /**
         * Optional.
         * The name of a frequent flyer or loyalty program. Use this key for any type of boarding pass.
         */
        public ?string $membershipProgramName = null,
        /**
         * Optional.
         * The ticketed passenger’s frequent flyer or loyalty number. Use this key for any type of boarding pass.
         */
        public ?string $membershipProgramNumber = null,
        /**
         * Optional.
         * An object that represents the name of the passenger. Use this key for any type of boarding pass.
         */
        public ?PersonName $passengerName = null,
        /**
         * Optional.
         * An array of the full names of the performers and opening acts at the event, in decreasing
         * order of significance. Use this key for any type of event ticket.
         *
         * @var null|string[]
         */
        public ?array $performerNames = null,
        /**
         * Optional.
         * The priority status the ticketed passenger holds, such as “Gold” or “Silver”. Use this
         * key for any type of boarding pass.
         */
        public ?string $priorityStatus = null,
        /**
         * Optional.
         * An array of objects that represent the details for each seat at an event or on a transit
         * journey. Use this key for any type of boarding pass or event ticket.
         *
         * @var null|Seat[]
         */
        #[All([new Type(Seat::class)])]
        public ?array $seats = null,
        /**
         * Optional.
         * The type of security screening for the ticketed passenger, such as “Priority”. Use this
         * key for any type of boarding pass.
         */
        public ?string $securityScreening = null,
        /**
         * Optional.
         * A Boolean value that determines whether the user’s device remains silent during an event
         * or transit journey. The system may override the key and determine the length of the period
         * of silence. Use this key for any type of boarding pass or event ticket.
         */
        public ?bool $silenceRequested = null,
        /**
         * Optional.
         * The commonly used name of the sport. Use this key only for a sports event ticket.
         */
        public ?string $sportName = null,
        /**
         * Optional.
         * The total price for the pass. Use this key for any pass type.
         */
        public ?CurrencyAmount $totalPrice = null,
        /**
         * Optional.
         * The name of the transit company. Use this key for any type of boarding pass.
         */
        public ?string $transitProvider = null,
        /**
         * Optional.
         * A brief description of the current boarding status for the vessel, such as
         * “On Time” or “Delayed”. For delayed status, provide currentBoardingDate,
         * currentDepartureDate, and currentArrivalDate where available. Use this key for
         * any type of boarding pass.
         */
        public ?string $transitStatus = null,
        /**
         * Optional.
         * A brief description that explains the reason for the current transitStatus,
         * such as “Thunderstorms”. Use this key for any type of boarding pass.
         */
        public ?string $transitStatusReason = null,
        /**
         * Optional.
         * The name of the vehicle to board, such as the name of a boat. Use this key for any type of boarding pass.
         */
        public ?string $vehicleName = null,
        /**
         * Optional.
         * The identifier of the vehicle to board, such as the aircraft registration number or train number.
         * Use this key for any type of boarding pass.
         */
        public ?string $vehicleNumber = null,
        /**
         * Optional.
         * A brief description of the type of vehicle to board, such as the model and manufacturer of a
         * plane or the class of a boat. Use this key for any type of boarding pass.
         */
        public ?string $vehicleType = null,
        /**
         * Optional.
         * The full name of the entrance, such as “Gate A”, to use to gain access to the ticketed event.
         * Use this key for any type of event ticket.
         */
        public ?string $venueEntrance = null,
        /**
         * Optional.
         * An object that represents the geographic coordinates of the venue. Use this key for any type of event ticket.
         */
        public ?SemanticLocation $venueLocation = null,
        /**
         * Optional.
         * The full name of the venue. Use this key for any type of event ticket.
         */
        public ?string $venueName = null,
        /**
         * Optional.
         * The phone number for enquiries about the venue’s ticketed event. Use this key for any type of event ticket.
         */
        public ?string $venuePhoneNumber = null,
        /**
         * Optional.
         * The full name of the room where the ticketed event is to take place. Use this key for any type of event ticket.
         */
        public ?string $venueRoom = null,
        /**
         * Optional.
         * An array of objects that represent the WiFi networks associated with the event; for example, the network
         * name and password associated with a developer conference. Use this key for any type of pass.
         *
         * @var null|WifiNetwork[]
         */
        #[All([new Type(WifiNetwork::class)])]
        public ?array $wifiAccess = null,
        /**
         * Optional.
         * The updated date and time of arrival, if different from the originally scheduled date
         * and time. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $currentArrivalDate = null,
        /**
         * Optional.
         * The updated date and time of boarding, if different from the originally scheduled date
         * and time. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $currentBoardingDate = null,
        /**
         * Optional.
         * The updated departure date and time, if different from the originally
         * scheduled date and time. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $currentDepartureDate = null,
        /**
         * Optional.
         * The date and time the event ends. Use this key for any type of event ticket.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $eventEndDate = null,
        /**
         * Optional.
         * The date and time the event starts. Use this key for any type of event ticket.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $eventStartDate = null,
        /**
         * Optional.
         * The originally scheduled date and time of arrival. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $originalArrivalDate = null,
        /**
         * Optional.
         * The originally scheduled date and time of boarding. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $originalBoardingDate = null,
        /**
         * Optional.
         * The originally scheduled date and time of departure. Use this key for any type of boarding pass.
         */
        #[Cast(ISO8601DateCaster::class)]
        public null|DateTimeInterface|string $originalDepartureDate = null,
    ) {
        parent::__construct();
    }
}
