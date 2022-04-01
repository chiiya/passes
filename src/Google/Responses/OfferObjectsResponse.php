<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\OfferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class OfferObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, OfferObject::class)]
    public array $resources = [];
}
