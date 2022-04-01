<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\TransitClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class TransitClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, TransitClass::class)]
    public array $resources = [];
}
