<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BarcodeType implements LegacyValueEnumerator
{
    /** @var string */
    public const BARCODE_TYPE_UNSPECIFIED = 'BARCODE_TYPE_UNSPECIFIED';

    /** @var string */
    public const AZTEC = 'AZTEC';

    /** @var string */
    public const CODE_39 = 'CODE_39';

    /** @var string */
    public const CODE_128 = 'CODE_128';

    /** @var string */
    public const CODABAR = 'CODABAR';

    /** @var string */
    public const DATA_MATRIX = 'DATA_MATRIX';

    /** @var string */
    public const EAN_8 = 'EAN_8';

    /** @var string */
    public const EAN_13 = 'EAN_13';

    /** @var string */
    public const ITF_14 = 'ITF_14';

    /** @var string */
    public const PDF_417 = 'PDF_417';

    /** @var string */
    public const QR_CODE = 'QR_CODE';

    /** @var string */
    public const UPC_A = 'UPC_A';

    /** @var string */
    public const TEXT_ONLY = 'TEXT_ONLY';

    public static function values(): array
    {
        return [
            self::BARCODE_TYPE_UNSPECIFIED,
            self::AZTEC,
            self::CODE_39,
            self::CODE_128,
            self::CODABAR,
            self::DATA_MATRIX,
            self::EAN_8,
            self::EAN_13,
            self::ITF_14,
            self::PDF_417,
            self::QR_CODE,
            self::UPC_A,
            self::TEXT_ONLY,
        ];
    }

    public function mapLegacyValues(string $value): string
    {
        return match ($value) {
            'aztec' => self::AZTEC,
            'code39' => self::CODE_39,
            'code128' => self::CODE_128,
            'codabar' => self::CODABAR,
            'dataMatrix' => self::DATA_MATRIX,
            'ean8' => self::EAN_8,
            'ean13' => self::EAN_13,
            'EAN13' => self::EAN_13,
            'itf14' => self::ITF_14,
            'pdf417' => self::PDF_417,
            'PDF417' => self::PDF_417,
            'qrCode' => self::QR_CODE,
            'qrcode' => self::QR_CODE,
            'upcA' => self::UPC_A,
            'textOnly' => self::TEXT_ONLY,
            default => $value,
        };
    }
}
