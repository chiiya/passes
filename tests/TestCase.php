<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function assertSameArray(array $a, array $b): void
    {
        $this->assertSame(ArrayHelper::sort($a), ArrayHelper::sort($b));
    }

    protected function setUp(): void
    {
        $path = realpath(__DIR__.'/../.env');

        if ($path !== false && file_exists($path)) {
            $dotenv = Dotenv::createUnsafeImmutable(realpath(__DIR__.'/../'));
            $dotenv->load();
        }
    }
}
