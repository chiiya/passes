<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\GenericClass;
use Chiiya\Passes\Google\Responses\GenericClassesResponse;

/**
 * @method GenericClassesResponse index(string $issuerId, array $parameters = [])
 * @method GenericClass get(string $id)
 * @method GenericClass create(GenericClass $instance)
 * @method GenericClass update(GenericClass $instance)
 */
class GenericClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return GenericClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return GenericClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return GenericClass::class;
    }
}
