<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Common\Validation\Required;

class Uri extends Component
{
    /**
     * Required.
     * The location of a web page, image, or other resource. URIs must have a scheme.
     */
    #[Required]
    public ?string $uri;

    /**
     * Required in some cases.
     * The URI's title appearing in the app as text. Recommended maximum is 20 characters to ensure full string
     * is displayed on smaller screens.
     */
    #[MaxLength(20)]
    public ?string $description;

    /**
     * Optional.
     * Translated strings for the description. Recommended maximum is 20 characters to ensure full string is
     * displayed on smaller screens.
     */
    public ?LocalizedString $localizedDescription;

    /**
     * Optional.
     * The ID associated with a uri. This field is here to enable ease of management of uris.
     */
    public ?string $id;

    /**
     * Helper method for creating new uri:
     * Uri::make('https://example.org/image.png').
     */
    public static function make(string $uri): static
    {
        return new static(uri: $uri);
    }
}
