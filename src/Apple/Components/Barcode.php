<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\BarcodeFormat;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class Barcode extends Component
{
    /**
     * Optional.
     * For example, a human-readable version of the barcode data in case
     * the barcode doesn't scan.
     */
    public ?string $altText;

    /**
     * Required.
     * Barcode format. The barcode format PKBarcodeFormatCode128 isn’t supported for watchOS.
     *
     * @see BarcodeFormat
     */
    #[Required]
    #[ValueIn([BarcodeFormat::QR, BarcodeFormat::AZTEC, BarcodeFormat::GS1_128, BarcodeFormat::PDF417])]
    public ?string $format;

    /**
     * Required.
     * Message or payload to be displayed as a barcode.
     */
    #[Required]
    public ?string $message;

    /**
     * Required.
     * Text encoding that is used to convert the message from the string representation to a data
     * representation to render the barcode.
     */
    public ?string $messageEncoding = 'iso-8859-1';
}
