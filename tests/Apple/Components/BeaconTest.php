<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Beacon;
use Chiiya\Passes\Tests\TestCase;

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
        $this->assertSameArray($attributes, $component->toArray());
    }
}
