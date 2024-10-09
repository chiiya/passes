<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\BarcodeRenderEncoding;
use Chiiya\Passes\Google\Enumerators\BarcodeType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class RotatingBarcode extends Component
{
    public function __construct(
        /**
         * Required
         * The type of barcode.
         */
        #[NotBlank]
        #[Choice([
            BarcodeType::BARCODE_TYPE_UNSPECIFIED,
            BarcodeType::AZTEC,
            BarcodeType::CODE_39,
            BarcodeType::CODE_128,
            BarcodeType::CODABAR,
            BarcodeType::DATA_MATRIX,
            BarcodeType::EAN_8,
            BarcodeType::EAN_13,
            BarcodeType::ITF_14,
            BarcodeType::PDF_417,
            BarcodeType::QR_CODE,
            BarcodeType::UPC_A,
            BarcodeType::TEXT_ONLY,
        ])]
        #[Cast(LegacyValueCaster::class, BarcodeType::class)]
        public string $type,
        /**
         * Required.
         * String encoded barcode value.
         * This string supports the following substitutions:
         * {totp_value_n}: Replaced with the TOTP value (see `totpDetails.parameters`).
         * {totp_timestamp_millis}: Replaced with the timestamp (millis since epoch) at which the barcode was generated.
         * {totp_timestamp_seconds}: Replaced with the timestamp (seconds since epoch) at which the barcode was generated.
         */
        public string $valuePattern,
        /**
         * Required
         * Details used to evaluate the {totp_value_n} substitutions.
         */
        public TotpDetails $totpDetails,
        /**
         * Optional
         * The render encoding for the barcode. When specified, barcode is rendered in the given encoding.
         * Otherwise, best known encoding is chosen by Google.
         */
        #[Choice([BarcodeRenderEncoding::UTF_8, BarcodeRenderEncoding::RENDER_ENCODING_UNSPECIFIED])]
        #[Cast(LegacyValueCaster::class, BarcodeRenderEncoding::class)]
        public ?string $renderEncoding = null,
        /**
         * Optional.
         * An optional text that will override the default text that shows under the barcode. This field is intended
         * for a human-readable equivalent of the barcode value, used when the barcode cannot be scanned.
         */
        public ?string $alternateText = null,
        /**
         * Optional.
         * Optional text that will be shown when the barcode is hidden behind a click action. This happens in cases
         * where a pass has Smart Tap enabled. If not specified, a default is chosen by Google.
         */
        public ?LocalizedString $showCodeText = null,
    ) {
        parent::__construct();
    }
}
