<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\GiftCardClass;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GiftCardClassesResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, GiftCardClass::class)]
    public array $resources = [];
}
