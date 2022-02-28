<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\SecondaryField;
use Chiiya\LaravelPasses\Apple\Enumerators\TextAlignment;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class SecondaryFieldTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = array_merge(Components::fieldAttributes(), [
            'textAlignment' => TextAlignment::LEFT,
        ]);
        $component = new SecondaryField($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
