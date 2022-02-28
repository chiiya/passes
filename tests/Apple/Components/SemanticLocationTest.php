<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\SemanticLocation;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class SemanticLocationTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::semanticLocation();
        $component = new SemanticLocation($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
