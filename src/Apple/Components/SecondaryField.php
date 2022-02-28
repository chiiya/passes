<?php

namespace Chiiya\LaravelPasses\Apple\Components;

use Chiiya\LaravelPasses\Apple\Enumerators\TextAlignment;
use Chiiya\LaravelPasses\Common\Validation\ValueIn;
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
