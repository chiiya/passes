<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Semantics;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class SemanticsTest extends TestCase
{
    #[Group('apple')]
    public function test_attributes(): void
    {
        $attributes = Components::semantics();
        $component = new Semantics(...$attributes);
        $expected = array_merge($attributes, [
            'currentArrivalDate' => '2022-01-01T08:00:00+00:00',
            'balance' => Components::currencyAmount(),
            'departureLocation' => Components::semanticLocation(),
            'destinationLocation' => Components::semanticLocation(),
            'passengerName' => Components::personName(),
            'seats' => [Components::seat()],
            'totalPrice' => Components::currencyAmount(),
            'venueLocation' => Components::semanticLocation(),
            'wifiAccess' => [Components::wifiNetwork()],
        ]);
        $this->assertSameArray($expected, $component->encode());
    }
}
