<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class TotpParameters extends Component
{
    public function __construct(
        /**
         * Required.
         * The secret key used for the TOTP value generation, encoded as a Base16 string.
         */
        #[NotBlank]
        public string $key,
        /**
         * Required.
         * The length of the TOTP value in decimal digits.
         */
        public int $valueLength,
    ) {
        parent::__construct();
    }

    /**
     * Helper method for creating new localized string, eg:
     * TotpParameters::make('key', 123).
     */
    public static function make(string $key, int $valueLength): static
    {
        return new static(key: $key, valueLength: $valueLength);
    }
}
