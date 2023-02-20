<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google\Fixtures;

use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\CallbackOptions;
use Chiiya\Passes\Google\Components\Common\DateTime;
use Chiiya\Passes\Google\Components\Common\GroupingInfo;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\RotatingBarcode;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Components\Common\TimeInterval;
use Chiiya\Passes\Google\Components\Common\TotpDetails;
use Chiiya\Passes\Google\Components\Common\TotpParameters;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Components\Generic\Notifications;
use Chiiya\Passes\Google\Components\Generic\UpcomingNotification;
use Chiiya\Passes\Google\Enumerators\BarcodeRenderEncoding;
use Chiiya\Passes\Google\Enumerators\BarcodeType;
use Chiiya\Passes\Google\Enumerators\Offer\RedemptionChannel;
use Chiiya\Passes\Google\Enumerators\ReviewStatus;
use Chiiya\Passes\Google\Enumerators\State;
use Chiiya\Passes\Google\Enumerators\TotpAlgorithm;
use Chiiya\Passes\Google\Enumerators\ViewUnlockRequirement;

class Passes
{
    public static function offerClass(): array
    {
        return [
            'id' => '1234567890123456789.coupon-15',
            'issuerName' => 'ACME',
            'reviewStatus' => ReviewStatus::APPROVED,
            'title' => '15% off purchases',
            'redemptionChannel' => RedemptionChannel::INSTORE,
            'provider' => 'ACME',
            'titleImage' => Image::make('https://example.org/title.png'),
            'helpUri' => Uri::make('https://example.org/help'),
            'localizedDetails' => LocalizedString::make('en', '::value::'),
            'imageModulesData' => [new ImageModuleData(mainImage: Image::make('https://example.org/wallet.png'))],
            'linksModuleData' => new LinksModuleData(
                uris: [
                    new Uri(uri: 'https://example.org/app', description: 'App'),
                    new Uri(uri: 'https://example.org', description: 'Homepage'),
                ],
            ),
            'hexBackgroundColor' => '#ffffff',
        ];
    }

    public static function offerObject(): array
    {
        return [
            'id' => '1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665',
            'classId' => '1234567890123456789.coupon-15',
            'classReference' => self::offerClass(),
            'state' => State::EXPIRED,
            'barcode' => new Barcode(type: BarcodeType::EAN_13, value: '1464194291627'),
            'validTimeInterval' => new TimeInterval(
                start: new DateTime(date: '2020-12-21T00:00:00+01:00'),
                end: new DateTime(date: '2021-01-04T23:59:59+01:00'),
            ),
            'hasUsers' => true,
            'groupingInfo' => new GroupingInfo(sortIndex: 1, groupingId: 'example'),
        ];
    }
    public static function genericClass(): array
    {
        return [
            "id" => "1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002",
            "imageModulesData" => [
                new ImageModuleData(
                    mainImage: Image::make("https://domain.com/sample.png")
                )
            ],
            "enableSmartTap" => false,
            "linksModuleData" => new LinksModuleData(
                uris: [
                    new Uri(uri: "https://domain.com/link-1", description: 'Sample link 1'),
                    new Uri(uri: "https://domain.com/link-2", description: 'Sample link 2')
                ]
            ),
            "multipleDevicesAndHoldersAllowedStatus" => "oneUserAllDevices",
            "callbackOptions" => new CallbackOptions(
                url: "https://domain.com/callback",
                updateRequestUrl: "https://domain.com/update-callback"
            ),
            "viewUnlockRequirement" => ViewUnlockRequirement::UNLOCK_REQUIRED_TO_VIEW
        ];
    }

    public static function genericObject(): array
    {
        return [
            "id" => "1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002",
            "classId" => "1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002",
            'cardTitle' => LocalizedString::make('en', 'Card title'),
            'subheader' => LocalizedString::make('en', 'Subheader'),
            'hasUsers' => true,
            'header' => LocalizedString::make('en', 'Header'),
            'logo' => Image::make('https://domain.com/logo.png'),
            'heroImage' => Image::make('https://domain.com/hero-image.png'),
            'hexBackgroundColor' => '#333',
            'state' => State::ACTIVE,
            'barcode' => new Barcode(
                type: BarcodeType::QR_CODE,
                renderEncoding: BarcodeRenderEncoding::UTF_8,
                value: '123456789',
            ),
            'validTimeInterval' => new TimeInterval(
                start: new DateTime(date: '2023-01-01T12:00:00+00:00'),
                end: new DateTime(date: '2023-01-01T13:00:00+00:00')
            ),
            'notifications' => new Notifications(
                upcomingNotification: new UpcomingNotification(
                    enableNotification: true
                ),
            ),
            'textModulesData' => [
                new TextModuleData(
                    id: 'id-1',
                    header: 'header-1',
                    body: 'body-1',
                ),
                new TextModuleData(
                    id: 'id-2',
                    header: 'header-2',
                    body: 'body-2',
                )
            ],
            'groupingInfo' => new GroupingInfo(
                groupingId: 'group-1'
            ),
            'rotatingBarcode' => new RotatingBarcode(
                type: BarcodeType::QR_CODE,
                renderEncoding: BarcodeRenderEncoding::UTF_8,
                valuePattern: '12345',
                totpDetails: new TotpDetails(
                    periodMillis: 1000,
                    algorithm: TotpAlgorithm::TOTP_SHA1,
                    parameters: [
                        TotpParameters::make('key-1', 123),
                        TotpParameters::make('key-2', 124)
                    ]
                ),
                alternateText: 'alternate-text',
                showCodeText: LocalizedString::make('en', 'show-code-text-en'),
            )
        ];
    }
}
