<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Passes\StoreCard;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use Chiiya\LaravelPasses\Tests\ArrayHelper;
use PHPUnit\Framework\TestCase;

class StoreCardTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $pass = new StoreCard(array_merge(Components::passAttributes(), Components::fields()));
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'storeCard' => Components::fieldValues(),
        ]);
        $this->assertSame(ArrayHelper::sort($expected), ArrayHelper::sort($pass->toArray()));
    }
}
