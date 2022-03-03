<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class BarcodeType implements LegacyValueEnumerator
{
    public const BARCODE_TYPE_UNSPECIFIED = 'BARCODE_TYPE_UNSPECIFIED';

    public const AZTEC = 'AZTEC';

    public const CODE_39 = 'CODE_39';

    public const CODE_128 = 'CODE_128';

    public const CODABAR = 'CODABAR';

    public const DATA_MATRIX = 'DATA_MATRIX';

    public const EAN_8 = 'EAN_8';

    public const EAN_13 = 'EAN_13';

    public const ITF_14 = 'ITF_14';

    public const PDF_417 = 'PDF_417';

    public const QR_CODE = 'QR_CODE';

    public const UPC_A = 'UPC_A';

    public const TEXT_ONLY = 'TEXT_ONLY';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'aztec',
            'code39',
            'code128',
            'codabar',
            'dataMatrix',
            'ean8',
            'ean13',
            'EAN13',
            'itf14',
            'pdf417',
            'PDF417',
            'qrCode',
            'qrcode',
            'upcA',
            'textOnly',
        ], [
            self::AZTEC,
            self::CODE_39,
            self::CODE_128,
            self::CODABAR,
            self::DATA_MATRIX,
            self::EAN_8,
            self::EAN_13,
            self::EAN_13,
            self::ITF_14,
            self::PDF_417,
            self::PDF_417,
            self::QR_CODE,
            self::QR_CODE,
            self::UPC_A,
            self::TEXT_ONLY,
        ], $value);
    }

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
}
