<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\GiftCardClass;
use Chiiya\Passes\Google\Responses\GiftCardClassesResponse;

/**
 * @method GiftCardClassesResponse index(string $issuerId, array $parameters = [])
 * @method GiftCardClass get(string $id)
 * @method GiftCardClass create(GiftCardClass $instance)
 * @method GiftCardClass update(GiftCardClass $instance)
 */
class GiftCardClassRepository extends ClassRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return GiftCardClass::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return GiftCardClassesResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return GiftCardClass::class;
    }
}
