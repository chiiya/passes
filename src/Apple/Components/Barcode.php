<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\BarcodeFormat;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class Barcode extends Component
{
    public function __construct(
        /**
         * Required.
         * Barcode format. The barcode format PKBarcodeFormatCode128 isn’t supported for watchOS.
         *
         * @see BarcodeFormat
         */
        #[NotBlank]
        #[Choice([BarcodeFormat::QR, BarcodeFormat::AZTEC, BarcodeFormat::GS1_128, BarcodeFormat::PDF417])]
        public string $format,
        /**
         * Required.
         * Message or payload to be displayed as a barcode.
         */
        #[NotBlank]
        public string $message,
        /**
         * Required.
         * Text encoding that is used to convert the message from the string representation to a data
         * representation to render the barcode.
         */
        #[NotBlank]
        public string $messageEncoding = 'iso-8859-1',
        /**
         * Optional.
         * For example, a human-readable version of the barcode data in case
         * the barcode doesn't scan.
         */
        public ?string $altText = null,
    ) {
        parent::__construct();
    }
}
