<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Common;

use Chiiya\Passes\Exceptions\ValidationException;
use Chiiya\Passes\Google\Components\Common\Message;
use Chiiya\Passes\Google\Passes\LoyaltyObject;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class ComponentTest extends TestCase
{
    #[Group('common')]
    public function test_decode_does_not_run_validation(): void
    {
        // The API may return values our constraints don't expect; decoding a response
        // must never fail validation (see chiiya/laravel-passes#40).
        $message = Message::decode(['messageType' => 'SOME_FUTURE_TYPE']);

        $this->assertSame('SOME_FUTURE_TYPE', $message->messageType);
    }

    #[Group('common')]
    public function test_direct_construction_still_runs_validation(): void
    {
        $this->expectException(ValidationException::class);

        new Message(messageType: 'SOME_FUTURE_TYPE');
    }

    #[Group('google')]
    public function test_decode_skips_validation_for_nested_components(): void
    {
        // Regression for chiiya/laravel-passes#40: updating a loyalty pass decodes the
        // response, whose classReference may carry values/fields our validation rejects.
        $object = LoyaltyObject::decode([
            'id' => 'issuer.object',
            'classId' => 'issuer.class',
            'state' => 'ACTIVE',
            'classReference' => [
                'id' => 'issuer.class',
                'reviewStatus' => 'SOME_FUTURE_STATUS',
                'programLogo' => ['sourceUri' => ['uri' => 'https://example.com/logo.png']],
            ],
        ]);

        $this->assertSame('SOME_FUTURE_STATUS', $object->classReference->reviewStatus);
        $this->assertNull($object->classReference->issuerName);
    }
}
