<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\FlightObject;
use Chiiya\Passes\Google\Responses\FlightObjectsResponse;

/**
 * @method FlightObjectsResponse index(string $classId, array $parameters = [])
 * @method FlightObject get(string $id)
 * @method FlightObject create(FlightObject $instance)
 * @method FlightObject update(FlightObject $instance)
 */
class FlightObjectRepository extends ObjectRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return FlightObject::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return FlightObjectsResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return FlightObject::class;
    }
}
