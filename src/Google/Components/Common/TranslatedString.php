<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class TranslatedString extends Component
{
    public function __construct(
        /**
         * Required.
         * Represents the BCP 47 language tag. Example values are "en-US", "en-GB", "de", or "de-AT".
         */
        #[NotBlank]
        public string $language,
        /**
         * Required.
         * The UTF-8 encoded translated string.
         */
        #[NotBlank]
        public string $value,
    ) {
        parent::__construct();
    }

    public static function create(array $values): static
    {
        return new self(...$values);
    }
}
