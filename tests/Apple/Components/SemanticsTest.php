<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Semantics;
use Chiiya\LaravelPasses\Tests\Apple\Fixtures\Components;
use PHPUnit\Framework\TestCase;

class SemanticsTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = Components::semantics();
        $component = new Semantics($attributes);
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
        $this->assertSame($expected, $component->toArray());
    }
}
