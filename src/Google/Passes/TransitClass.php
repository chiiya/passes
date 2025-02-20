<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\Transit\TransitType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class TransitClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'transitClass';

    public function __construct(
        /**
         * Required.
         * The type of transit this class represents, such as "bus".
         */
        #[Choice([
            TransitType::TRANSIT_TYPE_UNSPECIFIED,
            TransitType::BUS,
            TransitType::RAIL,
            TransitType::TRAM,
            TransitType::FERRY,
            TransitType::OTHER,
        ])]
        #[Cast(LegacyValueCaster::class, TransitType::class)]
        #[NotBlank]
        public string $transitType,
        /**
         * Required.
         * The logo image of the ticket. This image is displayed in the card detail view of the app.
         */
        public Image $logo,
        /**
         * Optional.
         * The name of the transit operator.
         */
        public ?LocalizedString $transitOperatorName = null,
        /**
         * Optional.
         * The wide logo of the ticket. When provided, this will be used in place of the logo in the top left of the card view.
         */
        public ?Image $wideLogo = null,
        /**
         * Optional.
         * Watermark image to display on the user's device.
         */
        public ?Image $watermark = null,
        /**
         * Optional.
         * If this field is present, transit tickets served to a user's device will always be in this language.
         * Represents the BCP 47 language tag. Example values are "en-US", "en-GB", "de", or "de-AT".
         */
        public ?string $languageOverride = null,
        /**
         * Optional.
         * A custom label to use for the transit terminus name value (transitObject.ticketLeg.transitTerminusName).
         */
        public ?LocalizedString $customTransitTerminusNameLabel = null,
        /**
         * Optional.
         * A custom label to use for the ticket number value (transitObject.ticketNumber).
         */
        public ?LocalizedString $customTicketNumberLabel = null,
        /**
         * Optional.
         * A custom label to use for the route restrictions value (transitObject.ticketRestrictions.routeRestrictions).
         */
        public ?LocalizedString $customRouteRestrictionsLabel = null,
        /**
         * Optional.
         * A custom label to use for the route restrictions details value
         * (transitObject.ticketRestrictions.routeRestrictionsDetails).
         */
        public ?LocalizedString $customRouteRestrictionsDetailsLabel = null,
        /**
         * Optional.
         * A custom label to use for the time restrictions details value
         * (transitObject.ticketRestrictions.timeRestrictions).
         */
        public ?LocalizedString $customTimeRestrictionsLabel = null,
        /**
         * Optional.
         * A custom label to use for the other restrictions value (transitObject.ticketRestrictions.otherRestrictions).
         */
        public ?LocalizedString $customOtherRestrictionsLabel = null,
        /**
         * Optional.
         * A custom label to use for the purchase receipt number value
         * (transitObject.purchaseDetails.purchaseReceiptNumber).
         */
        public ?LocalizedString $customPurchaseReceiptNumberLabel = null,
        /**
         * Optional.
         * A custom label to use for the confirmation code value (transitObject.purchaseDetails.confirmationCode).
         */
        public ?LocalizedString $customConfirmationCodeLabel = null,
        /**
         * Optional.
         * A custom label to use for the purchase face value (transitObject.purchaseDetails.ticketCost.faceValue).
         */
        public ?LocalizedString $customPurchaseFaceValueLabel = null,
        /**
         * Optional.
         * A custom label to use for the purchase price value (transitObject.purchaseDetails.ticketCost.purchasePrice).
         */
        public ?LocalizedString $customPurchasePriceLabel = null,
        /**
         * Optional.
         * A custom label to use for the transit discount message value
         * (transitObject.purchaseDetails.ticketCost.discountMessage).
         */
        public ?LocalizedString $customDiscountMessageLabel = null,
        /**
         * Optional.
         * A custom label to use for the carriage value (transitObject.ticketLeg.carriage).
         */
        public ?LocalizedString $customCarriageLabel = null,
        /**
         * Optional.
         * A custom label to use for the seat location value (transitObject.ticketLeg.ticketSeat.seat).
         */
        public ?LocalizedString $customSeatLabel = null,
        /**
         * Optional.
         * A custom label to use for the coach value (transitObject.ticketLeg.ticketSeat.coach).
         */
        public ?LocalizedString $customCoachLabel = null,
        /**
         * Optional.
         * A custom label to use for the boarding platform value (transitObject.ticketLeg.platform).
         */
        public ?LocalizedString $customPlatformLabel = null,
        /**
         * Optional.
         * A custom label to use for the boarding zone value (transitObject.ticketLeg.zone).
         */
        public ?LocalizedString $customZoneLabel = null,
        /**
         * Optional.
         * A custom label to use for the fare class value (transitObject.ticketLeg.ticketSeat.fareClass).
         */
        public ?LocalizedString $customFareClassLabel = null,
        /**
         * Optional.
         * A custom label to use for the transit concession category value (transitObject.concessionCategory).
         */
        public ?LocalizedString $customConcessionCategoryLabel = null,
        /**
         * Optional.
         * A custom label to use for the transit fare name value (transitObject.ticketLeg.fareName).
         */
        public ?LocalizedString $customFareNameLabel = null,
        /**
         * Optional.
         * Controls the display of the single-leg itinerary for this class. By default, an itinerary will
         * only display for multi-leg trips.
         */
        public ?bool $enableSingleLegItinerary = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
