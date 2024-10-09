<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\TotpAlgorithm;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class TotpDetails extends Component
{
    public function __construct(
        /**
         * Required.
         * The time interval used for the TOTP value generation, in milliseconds.
         */
        #[NotBlank]
        public string $periodMillis,
        /**
         * Required.
         * The TOTP algorithm used to generate the OTP.
         */
        #[NotBlank]
        #[Choice([TotpAlgorithm::TOTP_ALGORITHM_UNSPECIFIED, TotpAlgorithm::TOTP_SHA1])]
        public string $algorithm,
        /**
         * Required.
         * The TOTP parameters for each of the {totp_value_*} substitutions.
         * The TotpParameters at index n is used for the {totp_value_n} substitution.
         */
        #[NotBlank]
        #[Cast(ArrayCaster::class, TotpParameters::class)]
        public array $parameters = [],
    ) {
        parent::__construct();
    }
}
