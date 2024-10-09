<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class FieldTest extends TestCase
{
    #[Group('apple')]
    public function test_attributes(): void
    {
        $attributes = Components::fieldAttributes();
        $component = new Field(...$attributes);
        $this->assertSameArray($attributes, $component->encode());
    }
}
