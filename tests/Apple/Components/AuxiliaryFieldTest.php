<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\AuxiliaryField;
use Chiiya\LaravelPasses\Apple\Enumerators\TextAlignment;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class AuxiliaryFieldTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = array_merge(Components::fieldAttributes(), [
            'textAlignment' => TextAlignment::LEFT,
            'row' => 1,
        ]);
        $component = new AuxiliaryField($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
