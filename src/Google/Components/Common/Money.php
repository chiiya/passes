<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class Money extends Component
{
    /**
     * Required.
     * The unit of money amount in micros. For example, $1 USD would be represented as 1000000 micros.
     */
    #[Required]
    public ?string $micros;

    /**
     * Required.
     * The currency code, such as "USD" or "EUR.".
     */
    #[Required]
    public ?string $currencyCode;
}
