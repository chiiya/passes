<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class AuxiliaryField extends SecondaryField
{
    /**
     * Optional.
     * A number you use to add a row to the auxiliary field in an event ticket pass type.
     * Set the value to 1 to add an auxiliary row. Each row displays up to four fields.
     */
    #[ValueIn([0, 1])]
    public ?int $row;
}
