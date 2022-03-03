<?php

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\SemanticLocation;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class SemanticLocationTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::semanticLocation();
        $component = new SemanticLocation($attributes);
        $this->assertSameArray($attributes, $component->toArray());
    }
}
