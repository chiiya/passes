<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class Image extends Component
{
    public function __construct(
        /**
         * Required.
         * The location of the image. URIs must have a scheme.
         */
        #[NotBlank]
        public ImageUri $sourceUri,
    ) {
        parent::__construct();
    }

    /**
     * Helper method for creating new localized string:
     * Image::make('https://example.org/image.png').
     */
    public static function make(string $uri): static
    {
        return new static(sourceUri: new ImageUri(uri: $uri));
    }
}
