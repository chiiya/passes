<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google\Fixtures;

use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\DateTime;
use Chiiya\Passes\Google\Components\Common\GroupingInfo;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\TimeInterval;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Enumerators\BarcodeType;
use Chiiya\Passes\Google\Enumerators\Offer\RedemptionChannel;
use Chiiya\Passes\Google\Enumerators\ReviewStatus;
use Chiiya\Passes\Google\Enumerators\State;

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
}
