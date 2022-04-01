<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\EventTicketObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class EventTicketObjectsResponse extends Component
{
    use HasPagination;

    #[CastWith(ArrayCaster::class, EventTicketObject::class)]
    public array $resources = [];
}
