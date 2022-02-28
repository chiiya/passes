<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\WifiNetwork;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class WifiNetworkTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::wifiNetwork();
        $component = new WifiNetwork($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
