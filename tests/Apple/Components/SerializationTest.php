<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class SerializationTest extends TestCase
{
    #[Group('apple')]
    public function test_that_empty_values_are_removed(): void
    {
        $location = new Location(latitude: 37.331, longitude: -122.029);
        $this->assertSameArray([
            'latitude' => 37.331,
            'longitude' => -122.029,
            'altitude' => null,
            'relevantText' => null,
        ], $location->encode());
        $this->assertSame([
            'latitude' => 37.331,
            'longitude' => -122.029,
        ], $location->jsonSerialize());
    }
}
