<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class SemanticLocation extends Component
{
    /**
     * Required.
     * Latitude, in degrees, of the location.
     */
    #[Required]
    public ?float $latitude;

    /**
     * Required.
     * Longitude, in degrees, of the location.
     */
    #[Required]
    public ?float $longitude;
}
