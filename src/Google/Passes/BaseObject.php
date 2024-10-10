<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Google\Components\Common\LatLongPoint;
use Chiiya\Passes\Google\Components\Common\Message;
use Symfony\Component\Validator\Constraints\Count;

abstract class BaseObject extends AbstractObject
{
    public function __construct(
        /**
         * Optional.
         * An array of messages displayed in the app. All users of this object will receive its associated messages.
         * The maximum number of these fields is 10.
         *
         * @var Message[]
         */
        #[Cast(ArrayCaster::class, Message::class)]
        #[Count(max: 10)]
        public array $messages = [],
        /**
         * Optional.
         * The list of locations where the object can be used. The platform uses this information to trigger
         * geolocated notifications to users. Note that locations in the object override locations in the class which
         * override locations in the Google Places ID.
         */
        #[Cast(ArrayCaster::class, LatLongPoint::class)]
        #[Count(max: 20)]
        public array $locations = [],
        /**
         * Whether this object is currently linked to a single device. This field is set by the platform when a user
         * saves the object, linking it to their device. Intended for use by select partners. Contact support
         * for additional information.
         */
        public ?bool $hasLinkedDevice = null,
        /**
         * Optional.
         * Indicates if notifications should explicitly be suppressed. If this field is set to true, regardless of
         * the messages field, expiration notifications to the user will be suppressed. By default, this field is
         * set to false.
         */
        public ?bool $disableExpirationNotification = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
