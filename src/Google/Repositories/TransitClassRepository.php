<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\TransitClass;
use Chiiya\Passes\Google\Responses\TransitClassesResponse;

/**
 * @method TransitClassesResponse index(string $issuerId, array $parameters = [])
 * @method TransitClass get(string $id)
 * @method TransitClass create(TransitClass $instance)
 * @method TransitClass update(TransitClass $instance)
 */
class TransitClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return TransitClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return TransitClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return TransitClass::class;
    }
}
