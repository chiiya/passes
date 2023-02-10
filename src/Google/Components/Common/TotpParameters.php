<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class TotpParameters extends Component
{
    /**
     * Required.
     * The secret key used for the TOTP value generation, encoded as a Base16 string.
     */
    #[Required]
    public ?string $key;

    /**
     * Required.
     * The length of the TOTP value in decimal digits.
     */
    #[Required]
    public ?int $valueLength;

    /**
     * Helper method for creating new localized string, eg:
     * TotpParameters::make('key', 123).
     */
    public static function make(string $key, int $valueLength): static
    {
        return new static(key: $key, valueLength: $valueLength);
    }
}
