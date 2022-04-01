<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Enumerators\TransitType;
use Chiiya\Passes\Apple\Passes\BoardingPass;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

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
        $this->assertSameArray($expected, $pass->toArray());
    }
}
