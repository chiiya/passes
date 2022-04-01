<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\TransitObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TransitObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, TransitObject::class)]
    public array $resources = [];
}
