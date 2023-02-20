<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\GenericClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GenericClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, GenericClass::class)]
    public array $resources = [];
}
