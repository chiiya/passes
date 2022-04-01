<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Seat;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class SeatTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::seat();
        $component = new Seat($attributes);
        $this->assertSameArray($attributes, $component->toArray());
    }
}
