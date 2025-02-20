<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;

class CurrencyAmount extends Component
{
    public function __construct(
        /**
         * Optional.
         * The amount of money.
         */
        public ?string $amount = null,
        /**
         * Optional.
         * The currency code for amount.
         */
        public ?string $currencyCode = null,
    ) {
        parent::__construct();
    }
}
