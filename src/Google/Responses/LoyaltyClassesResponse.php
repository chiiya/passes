<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\LoyaltyClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class LoyaltyClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, LoyaltyClass::class)]
    public array $resources = [];
}
