<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = [
            'altitude' => 10.0,
            'latitude' => 37.331,
            'longitude' => -122.029,
            'relevantText' => 'Store nearby on 3rd and Main.',
        ];
        $component = new Location($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
