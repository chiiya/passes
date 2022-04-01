<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class CurrencyAmount extends Component
{
    /**
     * Optional.
     * The amount of money.
     */
    public ?string $amount;

    /**
     * Optional.
     * The currency code for amount.
     */
    public ?string $currencyCode;
}
