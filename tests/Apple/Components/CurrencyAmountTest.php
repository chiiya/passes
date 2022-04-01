<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\CurrencyAmount;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class CurrencyAmountTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::currencyAmount();
        $component = new CurrencyAmount($attributes);
        $this->assertSameArray($attributes, $component->toArray());
    }
}
