<?php

namespace Chiiya\Passes\Tests\Apple\Passes;

use Chiiya\Passes\Apple\Components\Image;
use Chiiya\Passes\Apple\Components\Localization;
use Chiiya\Passes\Apple\Enumerators\BarcodeFormat;
use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Tests\Apple\Fixtures\Components;
use Chiiya\Passes\Tests\TestCase;

class PassTest extends TestCase
{
    public function test_images_can_be_added(): void
    {
        $pass = new Coupon(Components::passAttributes());
        $pass->addImage(new Image(realpath(__DIR__.'/../Fixtures/icon.png'), 'icon'));
        $pass->addImage(new Image(realpath(__DIR__.'/../Fixtures/icon@2x.png')));
        $images = $pass->getImages();
        $this->assertCount(2, $images);
        $this->assertSame('icon', $images[0]->getName());
    }

    public function test_localizations_can_be_added(): void
    {
        $pass = new Coupon(Components::passAttributes());
        $pass->addLocalization(new Localization([
            'language' => 'en',
            'strings' => [
                'example' => 'EXAMPLE',
            ],
        ]));
        $pass->addLocalization(new Localization([
            'language' => 'de',
            'strings' => [
                'example' => 'BEISPIEL',
            ],
        ]));
        $localizations = $pass->getLocalizations();
        $this->assertCount(2, $localizations);
        $this->assertSame('en', $localizations[0]->language);
        $this->assertSame([
            'example' => 'EXAMPLE',
        ], $localizations[0]->strings);
    }

    public function test_pass_is_serialized_correctly(): void
    {
        $pass = new Coupon(array_merge(Components::fullPassAttributes(), Components::fields()));
        $expected = array_merge(Components::fullPassAttributes(), [
            'expirationDate' => '2025-12-31T23:59:59+00:00',
            'beacons' => [[
                'proximityUUID' => 'F8F589E9-C07E-58B0-AEAB-A36BE4D48FAC',
                'major' => 23423,
                'minor' => 234,
                'relevantText' => "You're near my store",
            ]],
            'locations' => [[
                'altitude' => 10.0,
                'latitude' => 37.331,
                'longitude' => -122.029,
                'relevantText' => 'Store nearby on 3rd and Main.',
            ]],
            'barcodes' => [[
                'format' => BarcodeFormat::PDF417,
                'message' => 'ABCD 123 EFGH 456 IJKL 789 MNOP',
                'messageEncoding' => 'iso-8859-2',
                'altText' => 'Barcode: ABCD 123 EFGH 456 IJKL 789 MNOP',
            ]],
            'nfc' => [
                'message' => 'Example message',
                'encryptionPublicKey' => 'ABC123',
                'requiresAuthentication' => true,
            ],
            'barcode' => null,
            'coupon' => Components::fieldValues(),
            'semantics' => array_merge(Components::semantics(), [
                'currentArrivalDate' => '2022-01-01T08:00:00+00:00',
                'balance' => Components::currencyAmount(),
                'departureLocation' => Components::semanticLocation(),
                'destinationLocation' => Components::semanticLocation(),
                'passengerName' => Components::personName(),
                'seats' => [Components::seat()],
                'totalPrice' => Components::currencyAmount(),
                'venueLocation' => Components::semanticLocation(),
                'wifiAccess' => [Components::wifiNetwork()],
            ]),
        ]);
        $this->assertSameArray($expected, $pass->toArray());
    }
}
