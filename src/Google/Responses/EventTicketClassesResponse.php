<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Google\Passes\EventTicketClass;

class EventTicketClassesResponse extends PaginatedResponse
{
    public function __construct(
        #[Cast(ArrayCaster::class, EventTicketClass::class)]
        public array $resources = [],
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
