<?php

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class FieldTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::fieldAttributes();
        $component = new Field($attributes);
        $this->assertSameArray($attributes, $component->toArray());
    }
}
