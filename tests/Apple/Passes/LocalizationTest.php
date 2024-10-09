<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Components\Localization;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

class LocalizationTest extends TestCase
{
    #[Group('apple')]
    public function test_strings_can_be_added(): void
    {
        $localization = new Localization(language: 'de');
        $localization->addString('EXAMPLE', 'Example');
        $localization->addString('LOREM', 'Ipsum');
        $this->assertSame([
            'EXAMPLE' => 'Example',
            'LOREM' => 'Ipsum',
        ], $localization->strings);
    }
}
