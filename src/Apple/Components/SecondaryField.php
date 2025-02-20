<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\TextAlignment;
use Symfony\Component\Validator\Constraints\Choice;

class SecondaryField extends Field
{
    public function __construct(
        /**
         * Optional.
         * Alignment for the field’s contents. Defaults to NATURAL.
         */
        #[Choice([TextAlignment::LEFT, TextAlignment::CENTER, TextAlignment::RIGHT, TextAlignment::NATURAL])]
        public ?string $textAlignment = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
