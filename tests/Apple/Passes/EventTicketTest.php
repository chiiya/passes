<?php

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Passes\EventTicket;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class EventTicketTest extends TestCase
{
    public function test_is_serialized_correctly(): void
    {
        $attributes = array_merge(Components::passAttributes(), Components::fields(), [
            'groupingIdentifier' => 'ID-123',
        ]);
        $pass = new EventTicket($attributes);
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'eventTicket' => Components::fieldValues(),
            'groupingIdentifier' => 'ID-123',
        ]);
        $this->assertSameArray($expected, $pass->toArray());
    }
}
