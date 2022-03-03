<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\EventTicketClassRepository;
use Chiiya\Passes\Google\Repositories\EventTicketObjectRepository;

/**
 * @method EventTicketClassRepository classes()
 * @method EventTicketObjectRepository objects()
 */
class EventTicketPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new EventTicketClassRepository($this->client);
        $this->objectRepository = new EventTicketObjectRepository($this->client);
    }
}
