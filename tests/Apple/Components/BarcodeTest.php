<?php

namespace Chiiya\LaravelPasses\Tests\Apple\Components;

use Chiiya\LaravelPasses\Apple\Components\Barcode;
use Chiiya\LaravelPasses\Apple\Enumerators\BarcodeFormat;
use PHPUnit\Framework\TestCase;

class BarcodeTest extends TestCase
{
    public function test_attributes(): void
    {
        $attributes = [
            'format' => BarcodeFormat::PDF417,
            'message' => 'ABCD 123 EFGH 456 IJKL 789 MNOP',
            'messageEncoding' => 'iso-8859-2',
            'altText' => 'Barcode: ABCD 123 EFGH 456 IJKL 789 MNOP',
        ];
        $component = new Barcode($attributes);
        $this->assertSame($attributes, $component->toArray());
    }
}
