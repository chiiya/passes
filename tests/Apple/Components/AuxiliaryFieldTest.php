<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\AuxiliaryField;
use Chiiya\Passes\Apple\Enumerators\TextAlignment;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class AuxiliaryFieldTest extends TestCase
{
    #[Group('apple')]
    public function test_attributes(): void
    {
        $attributes = array_merge(Components::fieldAttributes(), [
            'textAlignment' => TextAlignment::LEFT,
            'row' => 1,
        ]);
        $component = new AuxiliaryField(...$attributes);
        $this->assertSameArray($attributes, $component->encode());
    }
}
