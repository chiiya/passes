<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\OfferClass;
use Chiiya\Passes\Google\Responses\OfferClassesResponse;

/**
 * @method OfferClassesResponse index(string $issuerId, array $parameters = [])
 * @method OfferClass get(string $id)
 * @method OfferClass create(OfferClass $instance)
 * @method OfferClass update(OfferClass $instance)
 */
class OfferClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return OfferClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return OfferClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return OfferClass::class;
    }
}
