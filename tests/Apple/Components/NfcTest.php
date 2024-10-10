<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Nfc;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class NfcTest extends TestCase
{
    #[Group('apple')]
    public function test_attributes(): void
    {
        $attributes = [
            'message' => 'Example message',
            'encryptionPublicKey' => 'ABC123',
            'requiresAuthentication' => false,
        ];
        $component = new Nfc(...$attributes);
        $this->assertSameArray($attributes, $component->encode());
    }
}
