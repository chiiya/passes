<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class Nfc extends Component
{
    public function __construct(
        /**
         * Required.
         * The payload to be transmitted to the Apple Pay terminal. Must be 64 bytes or less. Messages longer
         * than 64 bytes are truncated by the system.
         */
        #[NotBlank]
        public string $message,
        /**
         * Optional.
         * The public encryption key used by the Value Added Services protocol. Use a Base64 encoded X.509
         * SubjectPublicKeyInfo structure containing a ECDH public key for group P256.
         */
        public ?string $encryptionPublicKey = null,
        /**
         * Optional.
         * A Boolean value that indicates whether the NFC pass requires authentication. The default value is false.
         * A value of true requires the user to authenticate for each use of the NFC pass.
         *
         * @since iOS v13.1
         */
        public ?bool $requiresAuthentication = null,
    ) {
        parent::__construct();
    }
}
