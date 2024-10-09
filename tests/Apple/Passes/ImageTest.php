<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Components\Image;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    #[Group('apple')]
    public function test_that_it_can_be_instantiated(): void
    {
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'), 'icon', 2);
        $this->assertSame('icon', $image->getName());
        $this->assertSame(2, $image->getScale());
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'));
        $this->assertNull($image->getName());
    }

    #[Group('apple')]
    public function test_setters(): void
    {
        $image = new Image(realpath(__DIR__.'/../Fixtures/icon.png'));
        $image->setName('icon');
        $this->assertSame('icon', $image->getName());
        $image->setScale(3);
        $this->assertSame(3, $image->getScale());
    }
}
