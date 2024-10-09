<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\MessageType;
use Symfony\Component\Validator\Constraints\Choice;

class Message extends Component
{
    public function __construct(
        /**
         * Optional.
         * The message header.
         */
        public ?string $header = null,
        /**
         * Optional.
         * The message body.
         */
        public ?string $body = null,
        /**
         * Optional.
         * The period of time that the message will be displayed to users.
         */
        public ?TimeInterval $displayInterval = null,
        /**
         * Optional.
         * The ID associated with a message. This field is here to enable ease of management of messages.
         */
        public ?string $id = null,
        /**
         * Optional.
         * The type of the message. Currently, this can only be set for offers.
         */
        #[Choice([MessageType::EXPIRATION_NOTIFICATION, MessageType::MESSAGE_TYPE_UNSPECIFIED, MessageType::TEXT])]
        #[Cast(LegacyValueCaster::class, MessageType::class)]
        public ?string $messageType = null,
        /**
         * Optional.
         * Translated strings for the message header.
         */
        public ?LocalizedString $localizedHeader = null,
        /**
         * Optional.
         * Translated strings for the message body.
         */
        public ?LocalizedString $localizedBody = null,
    ) {
        parent::__construct();
    }
}
