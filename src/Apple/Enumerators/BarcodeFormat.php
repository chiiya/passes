<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Enumerators;

final class BarcodeFormat
{
    /** @var string */
    public const QR = 'PKBarcodeFormatQR';

    /** @var string */
    public const PDF417 = 'PKBarcodeFormatPDF417';

    /** @var string */
    public const AZTEC = 'PKBarcodeFormatAztec';

    /** @var string */
    public const GS1_128 = 'PKBarcodeFormatCode128';
}
