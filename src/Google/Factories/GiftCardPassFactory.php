<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Repositories\GiftCardClassRepository;
use Chiiya\Passes\Google\Repositories\GiftCardObjectRepository;

/**
 * @method GiftCardClassRepository classes()
 * @method GiftCardObjectRepository objects()
 */
class GiftCardPassFactory extends BaseFactory
{
    public function __construct(ClientInterface $client)
    {
        parent::__construct($client);
        $this->classRepository = new GiftCardClassRepository($this->client);
        $this->objectRepository = new GiftCardObjectRepository($this->client);
    }
}
