<?php

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Passes\StoreCard;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class StoreCardTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $pass = new StoreCard(array_merge(Components::passAttributes(), Components::fields()));
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'storeCard' => Components::fieldValues(),
        ]);
        $this->assertSameArray($expected, $pass->toArray());
    }
}
