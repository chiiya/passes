<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

class OfferObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'offerObject';

    /**
     * Optional.
     * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
     */
    public ?OfferClass $classReference;
}
