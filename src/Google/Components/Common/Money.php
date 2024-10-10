<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class Money extends Component
{
    public function __construct(
        /**
         * Required.
         * The unit of money amount in micros. For example, $1 USD would be represented as 1000000 micros.
         */
        #[NotBlank]
        public string $micros,
        /**
         * Required.
         * The currency code, such as "USD" or "EUR.".
         */
        #[NotBlank]
        public string $currencyCode,
    ) {
        parent::__construct();
    }
}
