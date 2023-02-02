<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\GenericObject;
use Chiiya\Passes\Google\Responses\GenericObjectsResponse;

/**
 * @method GenericObjectsResponse index(string $classId, array $parameters = [])
 * @method GenericObject get(string $id)
 * @method GenericObject create(GenericObject $instance)
 * @method GenericObject update(GenericObject $instance)
 */
class GenericObjectRepository extends ObjectRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return GenericObject::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return GenericObjectsResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return GenericObject::class;
    }
}
