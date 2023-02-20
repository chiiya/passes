<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Enumerators\BarcodeRenderEncoding;
use Chiiya\Passes\Google\Enumerators\BarcodeType;
use Spatie\DataTransferObject\Attributes\CastWith;

class Barcode extends Component
{
    /**
     * Required.
     * The type of barcode.
     */
    #[Required]
    #[ValueIn([
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
    #[CastWith(LegacyValueCaster::class, BarcodeType::class)]
    public ?string $type;

    /**
     * Optional.
     * The render encoding for the barcode. When specified, barcode is rendered in the given encoding.
     * Otherwise best known encoding is chosen by Google.
     */
    #[ValueIn([BarcodeRenderEncoding::UTF_8, BarcodeRenderEncoding::RENDER_ENCODING_UNSPECIFIED])]
    #[CastWith(LegacyValueCaster::class, BarcodeRenderEncoding::class)]
    public ?string $renderEncoding;

    /**
     * Required.
     * The value encoded in the barcode.
     */
    #[Required]
    public ?string $value;

    /**
     * Optional.
     * An optional text that will override the default text that shows under the barcode. This field is intended
     * for a human readable equivalent of the barcode value, used when the barcode cannot be scanned.
     */
    public ?string $alternateText;

    /**
     * Optional.
     * Optional text that will be shown when the barcode is hidden behind a click action. This happens in cases
     * where a pass has Smart Tap enabled. If not specified, a default is chosen by Google.
     */
    public ?LocalizedString $showCodeText;
}
