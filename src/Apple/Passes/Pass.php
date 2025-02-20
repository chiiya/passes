<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Apple\Components\AuxiliaryField;
use Chiiya\Passes\Apple\Components\Barcode;
use Chiiya\Passes\Apple\Components\Beacon;
use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\Image;
use Chiiya\Passes\Apple\Components\Localization;
use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Apple\Components\Nfc;
use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Components\Semantics;
use Chiiya\Passes\Common\Casters\W3CDateCaster;
use Chiiya\Passes\Common\Component;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\CssColor;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Url;

abstract class Pass extends Component
{
    public function __construct(
        /**
         * Required.
         * Brief description of the pass, used by the iOS accessibility technologies.
         */
        #[NotBlank]
        public string $description,
        /**
         * Required.
         * Display name of the organization that originated and signed the pass.
         */
        #[NotBlank]
        public string $organizationName,
        /**
         * Required.
         * Pass type identifier, as issued by Apple. The value must correspond with your signing certificate.
         */
        #[NotBlank]
        public string $passTypeIdentifier,
        /**
         * Required.
         * Serial number that uniquely identifies the pass. No two passes with the same pass type identifier
         * may have the same serial number.
         */
        #[NotBlank]
        public string $serialNumber,
        /**
         * Required.
         * Team identifier of the organization that originated and signed the pass, as issued by Apple.
         */
        #[NotBlank]
        public string $teamIdentifier,
        /**
         * Required.
         * Version of the file format.
         */
        #[NotBlank]
        public int $formatVersion = 1,
        /**
         * Optional.
         * A Boolean value introduced in iOS 11 that controls whether to show the Share button on the
         * back of a pass. A value of true removes the button. The default value is false. This flag
         * has no effect in earlier versions of iOS, nor does it prevent sharing the pass in some other way.
         */
        public ?bool $sharingProhibited = null,
        /**
         * Optional.
         * A URL to be passed to the associated app when launching it.
         */
        public ?string $appLaunchUrl = null,
        /**
         * Optional.
         * A list of iTunes Store item identifiers for the associated apps.
         *
         * @var null|int[]
         */
        public ?array $associatedStoreIdentifiers = null,
        /**
         * Optional.
         * Custom information for companion apps. This data is not displayed to the user.
         * May contain any JSON data.
         */
        public ?array $userInfo = null,
        /**
         * Optional.
         * A Boolean value that indicates that the pass is void, such as a redeemed,
         * one-time-use coupon. The default value is false.
         */
        public ?bool $voided = null,
        /**
         * Optional.
         * Beacons marking locations where the pass is relevant.
         *
         * @since iOS v7.0
         *
         * @var Beacon[]
         */
        #[All([new Type(Beacon::class)])]
        #[Count(max: 10)]
        public array $beacons = [],
        /**
         * Optional.
         * Locations where the pass is relevant.
         *
         * @var Location[]
         */
        #[All([new Type(Location::class)])]
        #[Count(max: 10)]
        public array $locations = [],
        /**
         * Optional.
         * Maximum distance in meters from a relevant latitude and longitude that the pass is relevant.
         *
         * @since iOS v7.0
         */
        public ?int $maxDistance = null,
        /**
         * Optional
         * An object that contains machine-readable metadata the system uses to offer a pass and suggest
         * related actions. For example, setting Don’t Disturb mode for the duration of a movie.
         */
        public ?Semantics $semantics = null,
        /**
         * Optional.
         * Information specific to the pass’s barcode.
         *
         * @deprecated
         */
        public ?Barcode $barcode = null,
        /**
         * Optional.
         * Information specific to the pass’s barcode. The system uses the first valid barcode dictionary in the array.
         * Additional dictionaries can be added as fallbacks.
         *
         * @since iOS v7.0
         *
         * @var Barcode[]
         */
        #[All([new Type(Barcode::class)])]
        public array $barcodes = [],
        /**
         * Optional.
         * Background color of the pass, specified as an CSS-style RGB triple.
         */
        #[CssColor(formats: CssColor::RGB)]
        public ?string $backgroundColor = null,
        /**
         * Optional.
         * Foreground color of the pass, specified as a CSS-style RGB triple.
         */
        #[CssColor(formats: CssColor::RGB)]
        public ?string $foregroundColor = null,
        /**
         * Optional.
         * Color of the label text, specified as a CSS-style RGB triple.
         */
        #[CssColor(formats: CssColor::RGB)]
        public ?string $labelColor = null,
        /**
         * Optional.
         * Text displayed next to the logo on the pass.
         */
        public ?string $logoText = null,
        /**
         * Optional.
         * The authentication token to use with the web service. The token must be 16 characters or longer.
         */
        public ?string $authenticationToken = null,
        /**
         * Optional.
         * The URL for a web service that you use to update or personalize the pass. The URL can include an optional port number.
         *
         * @see https://developer.apple.com/library/archive/documentation/PassKit/Reference/PassKit_WebService/WebService.html#//apple_ref/doc/uid/TP40011988
         */
        #[Url]
        public ?string $webServiceURL = null,
        /**
         * Optional.
         * Information used for Value Added Service Protocol transactions.
         *
         * @since iOS v9.0
         */
        public ?Nfc $nfc = null,
        /**
         * Optional.
         * A Boolean value that controls whether to display the strip image without a
         * shine effect. The default value is true.
         */
        public ?bool $suppressStripShine = null,
        /**
         * Array of images to add to the pass archive.
         *
         * @var Image[]
         */
        #[All([new Type(Image::class)])]
        protected array $images = [],
        /**
         * Array of localizations to add to the pass archive.
         *
         * @var Localization[]
         */
        #[All([new Type(Localization::class)])]
        protected array $localizations = [],
        /**
         * Optional.
         * Date and time when the pass expires.
         */
        #[Cast(W3CDateCaster::class)]
        public null|DateTimeInterface|string $expirationDate = null,
        /**
         * Optional.
         * Date and time when the pass becomes relevant.
         */
        #[Cast(W3CDateCaster::class)]
        public null|DateTimeInterface|string $relevantDate = null,
        /** @var SecondaryField[] */
        #[All([new Type(SecondaryField::class)])]
        #[Count(max: 3)]
        #[Cast(ArrayCaster::class, itemType: SecondaryField::class)]
        public array $headerFields = [],
        /** @var Field[] */
        #[All([new Type(Field::class)])]
        #[Count(max: 2)]
        #[Cast(ArrayCaster::class, itemType: Field::class)]
        public array $primaryFields = [],
        /** @var SecondaryField[] */
        #[All([new Type(SecondaryField::class)])]
        #[Count(max: 4)]
        #[Cast(ArrayCaster::class, itemType: SecondaryField::class)]
        public array $secondaryFields = [],
        /** @var AuxiliaryField[] */
        #[All([new Type(AuxiliaryField::class)])]
        #[Count(max: 5)]
        #[Cast(ArrayCaster::class, itemType: AuxiliaryField::class)]
        public array $auxiliaryFields = [],
        /** @var Field[] */
        #[All([new Type(Field::class)])]
        #[Cast(ArrayCaster::class, itemType: Field::class)]
        public array $backFields = [],
    ) {
        parent::__construct();
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * @return Localization[]
     */
    public function getLocalizations(): array
    {
        return $this->localizations;
    }

    public function addLocalization(Localization $localization): self
    {
        $this->localizations[] = $localization;

        return $this;
    }

    protected function fields(): array
    {
        return ['headerFields', 'primaryFields', 'secondaryFields', 'auxiliaryFields', 'backFields'];
    }
}
