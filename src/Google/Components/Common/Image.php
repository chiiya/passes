<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class Image extends Component
{
    /**
     * Required.
     * The location of the image. URIs must have a scheme.
     */
    #[Required]
    public ?ImageUri $sourceUri;

    /**
     * Helper method for creating new localized string:
     * Image::make('https://example.org/image.png').
     */
    public static function make(string $uri): static
    {
        return new static(sourceUri: new ImageUri(uri: $uri));
    }
}
