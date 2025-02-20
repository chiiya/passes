<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class CouponTest extends TestCase
{
    #[Group('apple')]
    public function test_is_serialized_correctly(): void
    {
        $attributes = array_merge(Components::passAttributes(), Components::fields());
        $pass = new Coupon(...$attributes);
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'coupon' => Components::fieldValues(),
        ]);
        $this->assertSameArray($expected, $pass->encode());
    }
}
