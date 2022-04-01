<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\LoyaltyClass;
use Chiiya\Passes\Google\Responses\LoyaltyClassesResponse;

/**
 * @method LoyaltyClassesResponse index(string $issuerId, array $parameters = [])
 * @method LoyaltyClass get(string $id)
 * @method LoyaltyClass create(LoyaltyClass $instance)
 * @method LoyaltyClass update(LoyaltyClass $instance)
 */
class LoyaltyClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return LoyaltyClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return LoyaltyClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return LoyaltyClass::class;
    }
}
