<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Money;

class LoyaltyPointsBalance extends Component
{
    public function __construct(
        /**
         * Optional.
         * The string form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
         */
        public ?string $string = null,
        /**
         * Optional.
         * The integer form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
         */
        public ?int $int = null,
        /**
         * Optional.
         * The double form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
         */
        public ?float $double = null,
        /**
         * Optional.
         * The money form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
         */
        public ?Money $money = null,
    ) {
        parent::__construct();
    }
}
