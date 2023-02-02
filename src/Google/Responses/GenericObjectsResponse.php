<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\GenericObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GenericObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, GenericObject::class)]
    public array $resources = [];
}
