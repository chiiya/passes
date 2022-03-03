<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\FlightClassRepository;
use Chiiya\Passes\Google\Repositories\FlightObjectRepository;

/**
 * @method FlightClassRepository classes()
 * @method FlightObjectRepository objects()
 */
class FlightPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new FlightClassRepository($this->client);
        $this->objectRepository = new FlightObjectRepository($this->client);
    }
}
