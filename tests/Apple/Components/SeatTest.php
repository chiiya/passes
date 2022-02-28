<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Seat;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class SeatTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::seat();
        $component = new Seat($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
