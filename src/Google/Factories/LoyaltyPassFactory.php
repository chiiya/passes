<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\LoyaltyClassRepository;
use Chiiya\Passes\Google\Repositories\LoyaltyObjectRepository;

/**
 * @method LoyaltyClassRepository classes()
 * @method LoyaltyObjectRepository objects()
 */
class LoyaltyPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new LoyaltyClassRepository($this->client);
        $this->objectRepository = new LoyaltyObjectRepository($this->client);
    }
}
