<?php

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Enumerators\TextAlignment;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class SecondaryFieldTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = array_merge(Components::fieldAttributes(), [
            'textAlignment' => TextAlignment::LEFT,
        ]);
        $component = new SecondaryField($attributes);
        $this->assertSameArray($attributes, $component->toArray());
    }
}
