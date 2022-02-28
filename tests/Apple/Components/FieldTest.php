<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Field;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::fieldAttributes();
        $component = new Field($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
