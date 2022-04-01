<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\FlightClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class FlightClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, FlightClass::class)]
    public array $resources = [];
}
