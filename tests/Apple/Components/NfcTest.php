<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Nfc;
use PHPUnit\Framework\TestCase;

class NfcTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = [
            'message' => 'Example message',
            'encryptionPublicKey' => 'ABC123',
            'requiresAuthentication' => false,
        ];
        $component = new Nfc($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
