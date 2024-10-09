<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Passes\EventTicket;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class EventTicketTest extends TestCase
{
    #[Group('apple')]
    public function test_is_serialized_correctly(): void
    {
        $attributes = array_merge(Components::passAttributes(), Components::fields(), [
            'groupingIdentifier' => 'ID-123',
        ]);
        $pass = new EventTicket(...$attributes);
        $expected = array_merge(Components::passAttributes(), Components::nullablePassAttributes(), [
            'eventTicket' => Components::fieldValues(),
            'groupingIdentifier' => 'ID-123',
        ]);
        $this->assertSameArray($expected, $pass->encode());
    }
}
