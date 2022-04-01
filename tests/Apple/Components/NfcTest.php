<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Nfc;
use Chiiya\Passes\Tests\TestCase;

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
        $this->assertSameArray($attributes, $component->toArray());
    }
}
