<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Tests\TestCase;

class SerializationTest extends TestCase
{
    public function test_that_empty_values_are_removed(): void
    {
        $location = new Location([
            'latitude' => 37.331,
            'longitude' => -122.029,
        ]);
        $this->assertSameArray([
            'latitude' => 37.331,
            'longitude' => -122.029,
            'altitude' => null,
            'relevantText' => null,
        ], $location->toArray());
        $this->assertSame([
            'latitude' => 37.331,
            'longitude' => -122.029,
        ], $location->jsonSerialize());
    }
}
