# PHP library for creating iOS and Android Wallet Passes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chiiya/passes.svg?style=flat-square)](https://packagist.org/packages/chiiya/passes)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/chiiya/passes/run-tests?label=tests)](https://github.com/chiiya/passes/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/chiiya/passes/Check%20&%20fix%20styling?label=code%20style)](https://github.com/chiiya/passes/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/chiiya/passes.svg?style=flat-square)](https://packagist.org/packages/chiiya/passes)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require chiiya/passes
```

## Usage

Example code for creating coupons:

### Apple
```php
use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Enumerators\ImageType;
use Chiiya\Passes\Apple\Passes\Image;
use Chiiya\Passes\Apple\PassFactory;

$pass = new Coupon(
    description: '15% off purchases',
    organizationName: 'ACME',
    passTypeIdentifier: 'pass.acme.wallet',
    serialNumber: '1464194291627',
    teamIdentifier: '123456789',
    backgroundColor: 'rgb(0, 0, 0)',
    foregroundColor: 'rgb(255, 255, 255)',
    labelColor: 'rgb(255, 255, 255)',
    logoText: 'ACME',
    expirationDate: '2022-01-01T00:00:00+01:00',
    headerFields: [
        new SecondaryField(key: 'coupon-type', value: "#15-percent"),
    ],
    secondaryFields: [
        new SecondaryField(key: 'name', value: '15% off all purchases', label: 'Your Coupon'),
        new SecondaryField(key: 'expiration', value: '01.01.2022', label: 'Valid Until'),
    ],
    backFields: [
        new Field(key: 'terms', value: 'Lorem Ipsum', label: 'Terms of Use'),
    ],
);

$pass
    ->addImage(new Image('strip-1x.png', ImageType::STRIP, 1))
    ->addImage(new Image('strip-2x.png', ImageType::STRIP, 2))
    ->addImage(new Image('strip-3x.png', ImageType::STRIP, 3))
    ->addImage(new Image('logo.png'), ImageType::LOGO))
    ->addImage(new Image('icon.png'), ImageType::ICON))
    ->addImage(new Image('icon@2x.png'), ImageType::ICON, 2))
    ->addImage(new Image('icon@3x.png'), ImageType::ICON, 3));

$factory = new PassFactory();
$factory->setCertificate('CERT_PATH');
$factory->setPassword('CERT_PASSWORD');
$factory->setWwdr('WWDR_PATH');
$factory->setOutput('OUTPUT_DIR');
$factory->create($pass, 'filename');
```

### Google
```php
use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Enumerators\ImageType;
use Chiiya\Passes\Apple\Passes\Image;
use Chiiya\Passes\Apple\PassFactory;

$factory = new OfferPassFactory();
$factory->parseConfig('service_credentials.json');

$class = new \Chiiya\Passes\Google\Passes\OfferClass(
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
$factory->classes()->create($class);

$object = new OfferObject(
    classId: '1234567890123456789.coupon-15',
    id: '1234567890123456789.'.Str::uuid()->toString(),
    state: State::ACTIVE,
    barcode: new Barcode(
        type: BarcodeType::EAN_13,
        value: '1464194291627',
    ]),
    validTimeInterval: new TimeInterval(
        start: new DateTime(date: now()),
        end: new DateTime(now()->addMonth())),
    ),
);

$jwt = $factory->createJWT([
    'payload' => [
        'offerObjects' => [$object]
    ],
    'origins' => ['https://example.org'],
])->sign();
```

## Testing

```bash
just test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
