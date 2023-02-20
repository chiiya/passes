<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\TotpAlgorithm;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TotpDetails extends Component
{
    /**
     * Required.
     * The time interval used for the TOTP value generation, in milliseconds.
     */
    #[Required]
    public ?string $periodMillis;

    /**
     * Required.
     * The TOTP algorithm used to generate the OTP.
     */
    #[Required]
    #[ValueIn([TotpAlgorithm::TOTP_ALGORITHM_UNSPECIFIED, TotpAlgorithm::TOTP_SHA1])]
    public ?string $algorithm;

    /**
     * Required.
     * The TOTP parameters for each of the {totp_value_*} substitutions.
     * The TotpParameters at index n is used for the {totp_value_n} substitution.
     */
    #[Required]
    #[CastWith(ArrayCaster::class, TotpParameters::class)]
    public ?array $parameters;
}
