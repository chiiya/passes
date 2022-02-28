<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\PersonName;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class PersonNameTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::personName();
        $component = new PersonName($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
