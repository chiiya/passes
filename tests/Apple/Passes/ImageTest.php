<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Components\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function test_that_it_can_be_instantiated(): void
    {
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'), 'icon', 2);
        $this->assertSame('icon', $image->getName());
        $this->assertSame(2, $image->getScale());
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'));
        $this->assertNull($image->getName());
    }

    public function test_setters(): void
    {
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'));
        $image->setName('icon');
        $this->assertSame('icon', $image->getName());
        $image->setScale(3);
        $this->assertSame(3, $image->getScale());
    }
}
