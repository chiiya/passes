<?php

use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\DateTime;
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
use Chiiya\Passes\Google\Http\GoogleClient;
use Chiiya\Passes\Google\JWT;
use Chiiya\Passes\Google\Passes\OfferClass;
use Chiiya\Passes\Google\Passes\OfferObject;
use Chiiya\Passes\Google\Repositories\OfferClassRepository;
use Chiiya\Passes\Google\ServiceCredentials;

$credentials = ServiceCredentials::parse('service_credentials.json');
$client = GoogleClient::createAuthenticatedClient($credentials);
$repository = new OfferClassRepository($client);

$class = new OfferClass(
    id: '1234567890123456789.coupon-15',
    issuerName: 'ACME',
    reviewStatus: ReviewStatus::UNDER_REVIEW,
    title: '15% off purchases',
    redemptionChannel: RedemptionChannel::INSTORE,
    provider: 'ACME',
    titleImage: Image::make('https://example.org/title.png'),
    helpUri: Uri::make('https://example.org/help'),
    localizedDetails: LocalizedString::make('en', '::value::'),
    imageModulesData: [
        new ImageModuleData(mainImage: Image::make('https://example.org/wallet.png')),
    ],
    linksModuleData: new LinksModuleData(
        uris: [
            new Uri(uri: 'https://example.org/app', description: 'App'),
            new Uri(uri: 'https://example.org', description: 'Homepage'),
        ]
    ),
    hexBackgroundColor: '#ffffff',
);
$repository->create($class);

$object = new OfferObject(
    classId: '1234567890123456789.coupon-15',
    id: '1234567890123456789.'.Str::uuid()->toString(),
    state: State::ACTIVE,
    barcode: new Barcode(
        type: BarcodeType::EAN_13,
        value: '1464194291627',
    ),
    validTimeInterval: new TimeInterval(
        start: new DateTime(date: now()),
        end: new DateTime(now()->addMonth())
    ),
);

$jwt = (new JWT([
    'iss' => $credentials->client_email,
    'key' => $credentials->private_key,
    'origins' => ['https://example.org'],
]))->addOfferObject($object)->sign();
