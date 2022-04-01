<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\FlightObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class FlightObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, FlightObject::class)]
    public array $resources = [];
}
