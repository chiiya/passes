<?php

namespace Chiiya\LaravelPasses\Apple\Components;

use Chiiya\LaravelPasses\Common\Component;
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
