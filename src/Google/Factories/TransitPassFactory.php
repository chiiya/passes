<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\TransitClassRepository;
use Chiiya\Passes\Google\Repositories\TransitObjectRepository;

/**
 * @method TransitClassRepository classes()
 * @method TransitObjectRepository objects()
 */
class TransitPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new TransitClassRepository($this->client);
        $this->objectRepository = new TransitObjectRepository($this->client);
    }
}
