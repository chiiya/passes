<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class CouponTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $pass = new Coupon(array_merge(Components::passAttributes(), Components::fields()));
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'coupon' => Components::fieldValues(),
        ]);
        $this->assertSameArray($expected, $pass->toArray());
    }
}
