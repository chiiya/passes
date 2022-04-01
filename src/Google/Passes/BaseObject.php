<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxItems;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\AppLinkData;
use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LatLongPoint;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\Message;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Components\Common\TimeInterval;
use Chiiya\Passes\Google\Enumerators\State;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

abstract class BaseObject extends Component
{
    /**
     * Required.
     * The unique identifier for an object. This ID must be unique across all objects from an issuer. This value
     * should follow the format issuer ID.identifier where the former is issued by Google and latter is chosen by you.
     */
    #[Required]
    public ?string $id;

    /**
     * Required.
     * The class associated with this object. The class must be of the same type as this object, must already exist,
     * and must be approved. Class IDs should follow the format issuer ID.identifier where the former is issued by
     * Google and latter is chosen by you.
     */
    #[Required]
    public ?string $classId;

    /**
     * Required.
     * The state of the object. This field is used to determine how an object is displayed in the app.
     */
    #[ValueIn([State::STATE_UNSPECIFIED, State::ACTIVE, State::COMPLETED, State::EXPIRED, State::INACTIVE])]
    #[CastWith(LegacyValueCaster::class, State::class)]
    #[Required]
    public ?string $state;

    /**
     * Optional.
     * The barcode type and value.
     */
    public ?Barcode $barcode;

    /**
     * Optional.
     * An array of messages displayed in the app. All users of this object will receive its associated messages.
     * The maximum number of these fields is 10.
     *
     * @var Message[]
     */
    #[CastWith(ArrayCaster::class, Message::class)]
    #[MaxItems(10)]
    public array $messages = [];

    /**
     * Optional.
     * The time period this object will be active and object can be used. An object's state will be changed to
     * expired when this time period has passed.
     */
    public ?TimeInterval $validTimeInterval;

    /**
     * Optional.
     * The list of locations where the object can be used. The platform uses this information to trigger
     * geolocated notifications to users. Note that locations in the object override locations in the class which
     * override locations in the Google Places ID.
     */
    #[CastWith(ArrayCaster::class, LatLongPoint::class)]
    #[MaxItems(20)]
    public array $locations = [];

    /**
     * Optional.
     * Indicates if the object has users. This field is set by the platform.
     */
    public ?bool $hasUsers;

    /**
     * Optional.
     * Available only to Smart Tap enabled partners. Contact support for additional guidance.
     */
    public ?string $smartTapRedemptionValue;

    /**
     * Whether this object is currently linked to a single device. This field is set by the platform when a user
     * saves the object, linking it to their device. Intended for use by select partners. Contact support
     * for additional information.
     */
    public ?bool $hasLinkedDevice;

    /**
     * Optional.
     * Indicates if notifications should explicitly be suppressed. If this field is set to true, regardless of
     * the messages field, expiration notifications to the user will be suppressed. By default, this field is
     * set to false.
     */
    public ?bool $disableExpirationNotification;

    /**
     * Optional.
     * Image module data. The maximum number of these fields displayed is 1 from object level and 1 for
     * class object level.
     *
     * @var ImageModuleData[]
     */
    #[CastWith(ArrayCaster::class, ImageModuleData::class)]
    #[MaxItems(1)]
    public array $imageModulesData = [];

    /**
     * Optional.
     * Text module data. If text module data is also defined on the class, both will be displayed. The maximum
     * number of these fields displayed is 10 from the object and 10 from the class.
     *
     * @var TextModuleData[]
     */
    #[CastWith(ArrayCaster::class, TextModuleData::class)]
    #[MaxItems(10)]
    public array $textModulesData = [];

    /**
     * Optional.
     * Links module data. If links module data is also defined on the class, both will be displayed.
     */
    public ?LinksModuleData $linksModuleData;

    /**
     * Optional.
     * Optional information about the partner app link.
     */
    public ?AppLinkData $appLinkData;

    /**
     * Optional.
     * Optional banner image displayed on the front of the card. If none is present, hero image of the class,
     * if present, will be displayed. If hero image of the class is also not present, nothing will be displayed.
     */
    public ?Image $heroImage;
}
