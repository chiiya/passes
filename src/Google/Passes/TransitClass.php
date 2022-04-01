<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\Transit\TransitType;
use Spatie\DataTransferObject\Attributes\CastWith;

class TransitClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'transitClass';

    /**
     * Optional.
     * The name of the transit operator.
     */
    public ?LocalizedString $transitOperatorName;

    /**
     * Required.
     * The logo image of the ticket. This image is displayed in the card detail view of the app.
     */
    #[Required]
    public ?Image $logo;

    /**
     * Required.
     * The type of transit this class represents, such as "bus".
     */
    #[ValueIn([
        TransitType::TRANSIT_TYPE_UNSPECIFIED,
        TransitType::BUS,
        TransitType::RAIL,
        TransitType::TRAM,
        TransitType::FERRY,
        TransitType::OTHER,
    ])]
    #[CastWith(LegacyValueCaster::class, TransitType::class)]
    #[Required]
    public ?string $transitType;

    /**
     * Optional.
     * Watermark image to display on the user's device.
     */
    public ?Image $watermark;

    /**
     * Optional.
     * If this field is present, transit tickets served to a user's device will always be in this language.
     * Represents the BCP 47 language tag. Example values are "en-US", "en-GB", "de", or "de-AT".
     */
    public ?string $languageOverride;

    /**
     * Optional.
     * A custom label to use for the transit terminus name value (transitObject.ticketLeg.transitTerminusName).
     */
    public ?LocalizedString $customTransitTerminusNameLabel;

    /**
     * Optional.
     * A custom label to use for the ticket number value (transitObject.ticketNumber).
     */
    public ?LocalizedString $customTicketNumberLabel;

    /**
     * Optional.
     * A custom label to use for the route restrictions value (transitObject.ticketRestrictions.routeRestrictions).
     */
    public ?LocalizedString $customRouteRestrictionsLabel;

    /**
     * Optional.
     * A custom label to use for the route restrictions details value
     * (transitObject.ticketRestrictions.routeRestrictionsDetails).
     */
    public ?LocalizedString $customRouteRestrictionsDetailsLabel;

    /**
     * Optional.
     * A custom label to use for the time restrictions details value
     * (transitObject.ticketRestrictions.timeRestrictions).
     */
    public ?LocalizedString $customTimeRestrictionsLabel;

    /**
     * Optional.
     * A custom label to use for the other restrictions value (transitObject.ticketRestrictions.otherRestrictions).
     */
    public ?LocalizedString $customOtherRestrictionsLabel;

    /**
     * Optional.
     * A custom label to use for the purchase receipt number value
     * (transitObject.purchaseDetails.purchaseReceiptNumber).
     */
    public ?LocalizedString $customPurchaseReceiptNumberLabel;

    /**
     * Optional.
     * A custom label to use for the confirmation code value (transitObject.purchaseDetails.confirmationCode).
     */
    public ?LocalizedString $customConfirmationCodeLabel;

    /**
     * Optional.
     * A custom label to use for the purchase face value (transitObject.purchaseDetails.ticketCost.faceValue).
     */
    public ?LocalizedString $customPurchaseFaceValueLabel;

    /**
     * Optional.
     * A custom label to use for the purchase price value (transitObject.purchaseDetails.ticketCost.purchasePrice).
     */
    public ?LocalizedString $customPurchasePriceLabel;

    /**
     * Optional.
     * A custom label to use for the transit discount message value
     * (transitObject.purchaseDetails.ticketCost.discountMessage).
     */
    public ?LocalizedString $customDiscountMessageLabel;

    /**
     * Optional.
     * A custom label to use for the carriage value (transitObject.ticketLeg.carriage).
     */
    public ?LocalizedString $customCarriageLabel;

    /**
     * Optional.
     * A custom label to use for the seat location value (transitObject.ticketLeg.ticketSeat.seat).
     */
    public ?LocalizedString $customSeatLabel;

    /**
     * Optional.
     * A custom label to use for the coach value (transitObject.ticketLeg.ticketSeat.coach).
     */
    public ?LocalizedString $customCoachLabel;

    /**
     * Optional.
     * A custom label to use for the boarding platform value (transitObject.ticketLeg.platform).
     */
    public ?LocalizedString $customPlatformLabel;

    /**
     * Optional.
     * A custom label to use for the boarding zone value (transitObject.ticketLeg.zone).
     */
    public ?LocalizedString $customZoneLabel;

    /**
     * Optional.
     * A custom label to use for the fare class value (transitObject.ticketLeg.ticketSeat.fareClass).
     */
    public ?LocalizedString $customFareClassLabel;

    /**
     * Optional.
     * A custom label to use for the transit concession category value (transitObject.concessionCategory).
     */
    public ?LocalizedString $customConcessionCategoryLabel;

    /**
     * Optional.
     * A custom label to use for the transit fare name value (transitObject.ticketLeg.fareName).
     */
    public ?LocalizedString $customFareNameLabel;

    /**
     * Optional.
     * Controls the display of the single-leg itinerary for this class. By default, an itinerary will
     * only display for multi-leg trips.
     */
    public ?bool $enableSingleLegItinerary;
}
