<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Validation\MaxItems;
use Chiiya\Passes\Google\Components\Common\LatLongPoint;
use Chiiya\Passes\Google\Components\Common\Message;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

abstract class BaseObject extends AbstractObject
{
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
     * The list of locations where the object can be used. The platform uses this information to trigger
     * geolocated notifications to users. Note that locations in the object override locations in the class which
     * override locations in the Google Places ID.
     */
    #[CastWith(ArrayCaster::class, LatLongPoint::class)]
    #[MaxItems(20)]
    public array $locations = [];

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
}
