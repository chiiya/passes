<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Beacon;
use PHPUnit\Framework\TestCase;

class BeaconTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = [
            'proximityUUID' => 'F8F589E9-C07E-58B0-AEAB-A36BE4D48FAC',
            'major' => 23423,
            'minor' => 234,
            'relevantText' => "You're near my store",
        ];
        $component = new Beacon($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
