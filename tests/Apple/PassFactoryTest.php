<?php

namespace Chiiya\Passes\Tests\Apple;

use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\Image;
use Chiiya\Passes\Apple\Components\Localization;
use Chiiya\Passes\Apple\Enumerators\ImageType;
use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Apple\Passes\EventTicket;
use Chiiya\Passes\Apple\PassFactory;
use Chiiya\Passes\Exceptions\ValidationException;
use Chiiya\Passes\Tests\TestCase;

class PassFactoryTest extends TestCase
{
    protected PassFactory $factory;

    public function test_create_pass(): void
    {
        $pass = new Coupon([
            'description' => 'Example description',
            'organizationName' => 'ACME',
            'passTypeIdentifier' => 'pass.com.acme.test',
            'serialNumber' => '1890038600058',
            'teamIdentifier' => '12345ABCD',
            'primaryFields' => [new Field(key: 'primary', value: '::value::', label: 'Coupon')],
        ]);
        $pass
            ->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png')))
            ->addImage(new Image(realpath(__DIR__.'/Fixtures/icon@2x.png'), ImageType::ICON, 2))
            ->addLocalization(new Localization([
                'language' => 'en',
                'strings' => [
                    'EXAMPLE' => 'Free Breakfast',
                ],
            ]))
            ->addLocalization(new Localization([
                'language' => 'de',
                'strings' => [
                    'EXAMPLE' => 'Free Breakfast',
                ],
                'images' => [new Image(realpath(__DIR__.'/Fixtures/icon.png'), 'icon')],
            ]));
        $this->factory->setCertificate($_ENV['PASSES_APPLE_CERT']);
        $this->factory->setPassword(getenv('PASSES_APPLE_PASSWORD'));
        $this->factory->setWwdr(getenv('PASSES_APPLE_WWDR'));
        $this->factory->setOutput(__DIR__);
        $this->factory->setTempDir(realpath(__DIR__.'/../tmp'));
        $this->factory->create($pass);
        $this->assertFileExists(__DIR__.'/1890038600058.pkpass');
    }

    public function test_that_it_can_skip_signature(): void
    {
        $pass = new EventTicket([
            'description' => 'Example description',
            'organizationName' => 'ACME',
            'passTypeIdentifier' => 'pass.com.acme.test',
            'serialNumber' => '2890038600058',
            'teamIdentifier' => '12345ABCD',
            'primaryFields' => [new Field(key: 'primary', value: '::value::', label: 'Coupon')],
        ]);
        $pass->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png'), 'icon'));
        $this->factory->setSkipSignature(true);
        $this->factory->setOutput(__DIR__);
        $this->factory->create($pass);
        $this->assertFileExists(__DIR__.'/2890038600058.pkpass');
    }

    public function test_that_image_format_is_validated(): void
    {
        $pass = new Coupon([
            'description' => 'Example description',
            'organizationName' => 'ACME',
            'passTypeIdentifier' => 'pass.com.acme.test',
            'serialNumber' => '1890038600058',
            'teamIdentifier' => '12345ABCD',
        ]);
        $pass->addImage(new Image(realpath(__DIR__.'/Fixtures/format.jpg'), 'icon'));
        $this->factory->setSkipSignature(true);
        $this->factory->setOutput(__DIR__);
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessageMatches('/format\.jpg: expected \.png extension, found \.jpg/');
        $this->factory->create($pass);
    }

    public function test_that_image_type_is_validated(): void
    {
        $pass = new Coupon([
            'description' => 'Example description',
            'organizationName' => 'ACME',
            'passTypeIdentifier' => 'pass.com.acme.test',
            'serialNumber' => '1890038600058',
            'teamIdentifier' => '12345ABCD',
        ]);
        $pass->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png'), ImageType::BACKGROUND));
        $this->factory->setSkipSignature(true);
        $this->factory->setOutput(__DIR__);
        $failed = false;

        try {
            $this->factory->create($pass);
        } catch (ValidationException $exception) {
            $failed = true;
            $this->assertCount(2, $exception->getErrors());
            $this->assertSame(
                'Invalid image type `background` for pass type `Chiiya\Passes\Apple\Passes\Coupon`.',
                $exception->getErrors()[0]
            );
            $this->assertSame('The pass must have an icon image.', $exception->getErrors()[1]);
        }
        if ($failed === false) {
            $this->fail('No exception was thrown');
        }
    }

    public function test_that_it_validates_illegal_image_combination(): void
    {
        $pass = new EventTicket([
            'description' => 'Example description',
            'organizationName' => 'ACME',
            'passTypeIdentifier' => 'pass.com.acme.test',
            'serialNumber' => '1890038600058',
            'teamIdentifier' => '12345ABCD',
        ]);
        $pass
            ->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png'), ImageType::ICON))
            ->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png'), ImageType::STRIP))
            ->addImage(new Image(realpath(__DIR__.'/Fixtures/icon.png'), ImageType::BACKGROUND));
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessageMatches(
            '/When specifying a strip image, no background image or thumbnail may be specified/'
        );
        $this->factory->setSkipSignature(true);
        $this->factory->setOutput(__DIR__);
        $this->factory->create($pass);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new PassFactory();
    }
}
