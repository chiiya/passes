<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\CurrencyAmount;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class CurrencyAmountTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::currencyAmount();
        $component = new CurrencyAmount($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
