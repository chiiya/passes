<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\LoyaltyObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class LoyaltyObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, LoyaltyObject::class)]
    public array $resources = [];
}
