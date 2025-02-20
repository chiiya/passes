<?php

use Chiiya\Passes\Google\Components\Common\Barcode;
use Chiiya\Passes\Google\Components\Common\DateTime;
use Chiiya\Passes\Google\Components\Common\GroupingInfo;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\ImageModuleData;
use Chiiya\Passes\Google\Components\Common\LinksModuleData;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Common\TextModuleData;
use Chiiya\Passes\Google\Components\Common\TimeInterval;
use Chiiya\Passes\Google\Components\Common\Uri;
use Chiiya\Passes\Google\Components\Generic\Notifications;
use Chiiya\Passes\Google\Components\Generic\UpcomingNotification;
use Chiiya\Passes\Google\Enumerators\BarcodeRenderEncoding;
use Chiiya\Passes\Google\Enumerators\BarcodeType;
use Chiiya\Passes\Google\Enumerators\MultipleDevicesAndHoldersAllowedStatus;
use Chiiya\Passes\Google\Enumerators\State;
use Chiiya\Passes\Google\Http\GoogleClient;
use Chiiya\Passes\Google\JWT;
use Chiiya\Passes\Google\Passes\GenericClass;
use Chiiya\Passes\Google\Passes\GenericObject;
use Chiiya\Passes\Google\Repositories\GenericClassRepository;
use Chiiya\Passes\Google\ServiceCredentials;

$credentials = ServiceCredentials::parse('service_credentials.json');
$client = GoogleClient::createAuthenticatedClient($credentials);
$repository = new GenericClassRepository($client);

$class = new GenericClass(
    id: '1234567890123456789.generic-object',
    imageModulesData: [
        new ImageModuleData(
            mainImage: Image::make('https://example.org/image.png')
        )
    ],
    textModulesData: [
        new TextModuleData(
            header: 'Lorem ipsum',
            body: 'Dolor sit amet'
        )
    ],
    linksModuleData: new LinksModuleData(
        uris: [
            new Uri(uri: 'https://example.org/app', description: 'App'),
            new Uri(uri: 'https://example.org', description: 'Homepage'),
        ]
    ),
    multipleDevicesAndHoldersAllowedStatus: MultipleDevicesAndHoldersAllowedStatus::MULTIPLE_HOLDERS
);
$repository->create($class);

$object = new GenericObject(
    cardTitle: LocalizedString::make('en', '::cardTitle::'),
    header: LocalizedString::make('en', '::header::'),
    subheader: LocalizedString::make('en', '::subheader::'),
    logo: Image::make('https://example.org/logo.png'),
    hexBackgroundColor: '#333',
    notifications: new Notifications(
        upcomingNotification: new UpcomingNotification(
            enableNotification: true
        ),
    ),
    classId: '1234567890123456789.generic-object',
    id: '1234567890123456789.'.Str::uuid()->toString(),
    heroImage: Image::make('https://example.org/hero-image.png'),
    state: State::ACTIVE,
    barcode: new Barcode(
        type: BarcodeType::QR_CODE,
        value: '1464194291627',
        renderEncoding: BarcodeRenderEncoding::UTF_8,
    ),
    validTimeInterval: new TimeInterval(
        start: new DateTime(date: now()),
        end: new DateTime(date: now()->addMonth())
    ),
    textModulesData: [
        new TextModuleData(
            header: 'label-1',
            body: 'value-1',
            id: 'key-1',
        ),
        new TextModuleData(
            header: 'label-2',
            body: 'value-2',
            id: 'key-2',
        )
    ],
    groupingInfo: new GroupingInfo(
        groupingId: 'group1'
    )
);

$jwt = (new JWT(
    iss: $credentials->client_email,
    key: $credentials->private_key,
    origins: ['https://example.org'],
))->addGenericObject($object)->sign();
