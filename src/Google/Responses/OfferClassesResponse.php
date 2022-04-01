<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\OfferClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class OfferClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, OfferClass::class)]
    public array $resources = [];
}
