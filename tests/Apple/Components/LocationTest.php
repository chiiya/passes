<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Tests\TestCase;

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
        $this->assertSameArray($attributes, $component->toArray());
    }
}
