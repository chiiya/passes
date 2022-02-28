<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Passes\Coupon;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use Chiiya\LaravelPasses\Tests\ArrayHelper;
use PHPUnit\Framework\TestCase;

class CouponTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $pass = new Coupon(array_merge(Components::passAttributes(), Components::fields()));
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'coupon' => Components::fieldValues(),
        ]);
        $this->assertSame(ArrayHelper::sort($expected), ArrayHelper::sort($pass->toArray()));
    }
}
