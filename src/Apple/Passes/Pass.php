<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Apple\Components\Barcode;
use Chiiya\Passes\Apple\Components\Beacon;
use Chiiya\Passes\Apple\Components\Image;
use Chiiya\Passes\Apple\Components\Localization;
use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Apple\Components\Nfc;
use Chiiya\Passes\Apple\Components\Semantics;
use Chiiya\Passes\Common\Casters\W3CDateCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Contains;
use Chiiya\Passes\Common\Validation\MaxItems;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\RgbColor;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

abstract class Pass extends Component
{
    /**
     * Required.
     * Brief description of the pass, used by the iOS accessibility technologies.
     */
    #[Required]
    public ?string $description;

    /**
     * Required.
     * Version of the file format.
     */
    #[Required]
    public int $formatVersion = 1;

    /**
     * Required.
     * Display name of the organization that originated and signed the pass.
     */
    #[Required]
    public ?string $organizationName;

    /**
     * Required.
     * Pass type identifier, as issued by Apple. The value must correspond with your signing certificate.
     */
    #[Required]
    public ?string $passTypeIdentifier;

    /**
     * Required.
     * Serial number that uniquely identifies the pass. No two passes with the same pass type identifier
     * may have the same serial number.
     */
    #[Required]
    public ?string $serialNumber;

    /**
     * Required.
     * Team identifier of the organization that originated and signed the pass, as issued by Apple.
     */
    #[Required]
    public ?string $teamIdentifier;

    /**
     * Optional.
     * A Boolean value introduced in iOS 11 that controls whether to show the Share button on the
     * back of a pass. A value of true removes the button. The default value is false. This flag
     * has no effect in earlier versions of iOS, nor does it prevent sharing the pass in some other way.
     */
    public ?bool $sharingProhibited;

    /**
     * Optional.
     * A URL to be passed to the associated app when launching it.
     */
    public ?string $appLaunchUrl;

    /**
     * Optional.
     * A list of iTunes Store item identifiers for the associated apps.
     *
     * @var null|int[]
     */
    public ?array $associatedStoreIdentifiers;

    /**
     * Optional.
     * Custom information for companion apps. This data is not displayed to the user.
     * May contain any JSON data.
     */
    public ?array $userInfo;

    /**
     * Optional.
     * Date and time when the pass expires.
     */
    #[CastWith(W3CDateCaster::class)]
    public ?string $expirationDate;

    /**
     * Optional.
     * A Boolean value that indicates that the pass is void, such as a redeemed,
     * one-time-use coupon. The default value is false.
     */
    public ?bool $voided;

    /**
     * Optional.
     * Beacons marking locations where the pass is relevant.
     *
     * @since iOS v7.0
     *
     * @var Beacon[]
     */
    #[CastWith(ArrayCaster::class, Beacon::class)]
    #[MaxItems(10)]
    public array $beacons = [];

    /**
     * Optional.
     * Locations where the pass is relevant.
     *
     * @var Location[]
     */
    #[CastWith(ArrayCaster::class, Location::class)]
    #[MaxItems(10)]
    public array $locations = [];

    /**
     * Optional.
     * Maximum distance in meters from a relevant latitude and longitude that the pass is relevant.
     *
     * @since iOS v7.0
     */
    public ?int $maxDistance;

    /**
     * Optional.
     * Date and time when the pass becomes relevant.
     */
    #[CastWith(W3CDateCaster::class)]
    public ?string $relevantDate;

    /**
     * Optional
     * An object that contains machine-readable metadata the system uses to offer a pass and suggest
     * related actions. For example, setting Don’t Disturb mode for the duration of a movie.
     */
    public ?Semantics $semantics;

    /**
     * Optional.
     * Information specific to the pass’s barcode.
     *
     * @deprecated
     */
    public ?Barcode $barcode;

    /**
     * Optional.
     * Information specific to the pass’s barcode. The system uses the first valid barcode dictionary in the array.
     * Additional dictionaries can be added as fallbacks.
     *
     * @since iOS v7.0
     *
     * @var Barcode[]
     */
    #[CastWith(ArrayCaster::class, Barcode::class)]
    public array $barcodes = [];

    /**
     * Optional.
     * Background color of the pass, specified as an CSS-style RGB triple.
     */
    #[RgbColor]
    public ?string $backgroundColor;

    /**
     * Optional.
     * Foreground color of the pass, specified as a CSS-style RGB triple.
     */
    #[RgbColor]
    public ?string $foregroundColor;

    /**
     * Optional.
     * Color of the label text, specified as a CSS-style RGB triple.
     */
    #[RgbColor]
    public ?string $labelColor;

    /**
     * Optional.
     * Text displayed next to the logo on the pass.
     */
    public ?string $logoText;

    /**
     * Optional.
     * The authentication token to use with the web service. The token must be 16 characters or longer.
     */
    public ?string $authenticationToken;

    /**
     * Optional.
     * The URL for a web service that you use to update or personalize the pass. The URL can include an optional port number.
     *
     * @see https://developer.apple.com/library/archive/documentation/PassKit/Reference/PassKit_WebService/WebService.html#//apple_ref/doc/uid/TP40011988
     */
    #[Contains('https://')]
    public ?string $webServiceURL;

    /**
     * Optional.
     * Information used for Value Added Service Protocol transactions.
     *
     * @since iOS v9.0
     */
    public ?Nfc $nfc;

    /**
     * Optional.
     * A Boolean value that controls whether to display the strip image without a
     * shine effect. The default value is true.
     */
    public ?bool $suppressStripShine;

    /**
     * Array of images to add to the pass archive.
     *
     * @var Image[]
     */
    protected array $images = [];

    /**
     * Array of localizations to add to the pass archive.
     *
     * @var Localization[]
     */
    protected array $localizations = [];

    /**
     * @return Image[]
     */
    final public function getImages(): array
    {
        return $this->images;
    }

    final public function addImage(Image $image): self
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * @return Localization[]
     */
    final public function getLocalizations(): array
    {
        return $this->localizations;
    }

    final public function addLocalization(Localization $localization): self
    {
        $this->localizations[] = $localization;

        return $this;
    }
}
