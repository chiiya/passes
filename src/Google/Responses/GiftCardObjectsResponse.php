<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\GiftCardObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GiftCardObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, GiftCardObject::class)]
    public array $resources = [];
}
