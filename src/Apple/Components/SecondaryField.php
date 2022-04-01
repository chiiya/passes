<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\TextAlignment;
use Chiiya\Passes\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class SecondaryField extends Field
{
    /**
     * Optional.
     * Alignment for the field’s contents. Defaults to NATURAL.
     */
    #[ValueIn([TextAlignment::LEFT, TextAlignment::CENTER, TextAlignment::RIGHT, TextAlignment::NATURAL])]
    public ?string $textAlignment;
}
