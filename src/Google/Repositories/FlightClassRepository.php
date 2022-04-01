<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\FlightClass;
use Chiiya\Passes\Google\Responses\FlightClassesResponse;

/**
 * @method FlightClassesResponse index(string $issuerId, array $parameters = [])
 * @method FlightClass get(string $id)
 * @method FlightClass create(FlightClass $instance)
 * @method FlightClass update(FlightClass $instance)
 */
class FlightClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return FlightClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return FlightClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return FlightClass::class;
    }
}
