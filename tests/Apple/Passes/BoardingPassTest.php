<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Enumerators\TransitType;
use Chiiya\LaravelPasses\Apple\Passes\BoardingPass;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use Chiiya\LaravelPasses\Tests\ArrayHelper;
use PHPUnit\Framework\TestCase;

class BoardingPassTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $attributes = array_merge(Components::passAttributes(), Components::fields(), [
            'groupingIdentifier' => 'ID-123',
            'transitType' => TransitType::AIR,
        ]);
        $pass = new BoardingPass($attributes);
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'boardingPass' => array_merge(Components::fieldValues(), [
                'transitType' => TransitType::AIR,
            ]),
            'groupingIdentifier' => 'ID-123',
        ]);
        $this->assertSame(ArrayHelper::sort($expected), ArrayHelper::sort($pass->toArray()));
    }
}
