<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxLength;

class TextModuleData extends Component
{
    /**
     * Optional.
     * The header of the Text Module. Recommended maximum length is 35 characters to ensure full string is
     * displayed on smaller screens.
     */
    #[MaxLength(35)]
    public ?string $header;

    /**
     * Optional.
     * The body of the Text Module, which is defined as an uninterrupted string. Recommended maximum length is
     * 500 characters to ensure full string is displayed on smaller screens.
     */
    #[MaxLength(500)]
    public ?string $body;

    /**
     * Optional.
     * Translated strings for the header.
     */
    public ?LocalizedString $localizedHeader;

    /**
     * Optional.
     * Translated strings for the body.
     */
    public ?LocalizedString $localizedBody;

    /**
     * Optional.
     * The ID associated with a text module. This field is here to enable ease of management of text modules.
     */
    public ?string $id;
}
