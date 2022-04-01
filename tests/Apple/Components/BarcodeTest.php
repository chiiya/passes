<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Components;

use Chiiya\Passes\Apple\Components\Barcode;
use Chiiya\Passes\Apple\Enumerators\BarcodeFormat;
use Chiiya\Passes\Tests\TestCase;

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
        $this->assertSameArray($attributes, $component->toArray());
    }
}
