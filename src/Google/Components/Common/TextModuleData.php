<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\Length;

class TextModuleData extends Component
{
    public function __construct(
        /**
         * Optional.
         * The header of the Text Module. Recommended maximum length is 35 characters to ensure full string is
         * displayed on smaller screens.
         */
        #[Length(max: 35)]
        public ?string $header = null,
        /**
         * Optional.
         * The body of the Text Module, which is defined as an uninterrupted string. Recommended maximum length is
         * 500 characters to ensure full string is displayed on smaller screens.
         */
        #[Length(max: 500)]
        public ?string $body = null,
        /**
         * Optional.
         * Translated strings for the header.
         */
        public ?LocalizedString $localizedHeader = null,
        /**
         * Optional.
         * Translated strings for the body.
         */
        public ?LocalizedString $localizedBody = null,
        /**
         * Optional.
         * The ID associated with a text module. This field is here to enable ease of management of text modules.
         */
        public ?string $id = null,
    ) {
        parent::__construct();
    }
}
