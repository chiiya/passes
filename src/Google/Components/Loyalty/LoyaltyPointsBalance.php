<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Loyalty;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Money;

class LoyaltyPointsBalance extends Component
{
    /**
     * Optional.
     * The string form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
     */
    public ?string $string;

    /**
     * Optional.
     * The integer form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
     */
    public ?int $int;

    /**
     * Optional.
     * The double form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
     */
    public ?float $double;

    /**
     * Optional.
     * The money form of a balance. Only one of these subtypes (string, int, double, money) should be populated.
     */
    public ?Money $money;
}
