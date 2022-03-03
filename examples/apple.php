<?php

use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Enumerators\ImageType;
use Chiiya\Passes\Apple\Components\Image;
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
    ->addImage(new Image('logo.png', ImageType::LOGO))
    ->addImage(new Image('icon.png', ImageType::ICON))
    ->addImage(new Image('icon@2x.png', ImageType::ICON, 2))
    ->addImage(new Image('icon@3x.png', ImageType::ICON, 3));

$factory = new PassFactory();
$factory->setCertificate('CERT_PATH');
$factory->setPassword('CERT_PASSWORD');
$factory->setWwdr('WWDR_PATH');
$factory->setOutput('OUTPUT_DIR');
$factory->create($pass, 'filename');
