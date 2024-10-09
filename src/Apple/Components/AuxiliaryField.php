<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Symfony\Component\Validator\Constraints\Choice;

class AuxiliaryField extends SecondaryField
{
    public function __construct(
        /**
         * Optional.
         * A number you use to add a row to the auxiliary field in an event ticket pass type.
         * Set the value to 1 to add an auxiliary row. Each row displays up to four fields.
         */
        #[Choice([0, 1])]
        public ?int $row = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
