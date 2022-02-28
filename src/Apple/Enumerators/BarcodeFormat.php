<?php

namespace Chiiya\LaravelPasses\Apple\Enumerators;

final class BarcodeFormat
{
    public const QR = 'PKBarcodeFormatQR';

    public const PDF417 = 'PKBarcodeFormatPDF417';

    public const AZTEC = 'PKBarcodeFormatAztec';

    public const GS1_128 = 'PKBarcodeFormatCode128';
}
