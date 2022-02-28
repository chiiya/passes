<?php

namespace Chiiya\LaravelPasses\Apple\Components;

use Chiiya\LaravelPasses\Common\Component;
use Chiiya\LaravelPasses\Common\Validation\Required;
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
