<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\OfferClassRepository;
use Chiiya\Passes\Google\Repositories\OfferObjectRepository;

/**
 * @method OfferClassRepository classes()
 * @method OfferObjectRepository objects()
 */
class OfferPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new OfferClassRepository($this->client);
        $this->objectRepository = new OfferObjectRepository($this->client);
    }
}
