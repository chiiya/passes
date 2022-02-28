<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Passes\EventTicket;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use Chiiya\LaravelPasses\Tests\ArrayHelper;
use PHPUnit\Framework\TestCase;

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
        $this->assertSame(ArrayHelper::sort($expected), ArrayHelper::sort($pass->toArray()));
    }
}
