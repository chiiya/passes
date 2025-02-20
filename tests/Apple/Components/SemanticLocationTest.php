<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\SemanticLocation;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class SemanticLocationTest extends TestCase
{
    #[Group('apple')]
    public function test_attributes(): void
    {
        $attributes = Components::semanticLocation();
        $component = new SemanticLocation(...$attributes);
        $this->assertSameArray($attributes, $component->encode());
    }
}
