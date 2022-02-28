<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Location;
use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{
    public function test_that_empty_values_are_removed(): void
    {
        $location = new Location([
            'latitude' => 37.331,
            'longitude' => -122.029,
        ]);
        $this->assertSame([
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
