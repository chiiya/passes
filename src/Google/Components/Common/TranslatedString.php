<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class TranslatedString extends Component
{
    /**
     * Required.
     * Represents the BCP 47 language tag. Example values are "en-US", "en-GB", "de", or "de-AT".
     */
    #[Required]
    public ?string $language;

    /**
     * Required.
     * The UTF-8 encoded translated string.
     */
    #[Required]
    public ?string $value;
}
