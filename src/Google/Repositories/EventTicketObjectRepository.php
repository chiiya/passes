<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Google\Passes\EventTicketObject;
use Chiiya\Passes\Google\Responses\EventTicketObjectsResponse;

/**
 * @method EventTicketObjectsResponse index(string $classId, array $parameters = [])
 * @method EventTicketObject get(string $id)
 * @method EventTicketObject create(EventTicketObject $instance)
 * @method EventTicketObject update(EventTicketObject $instance)
 */
class EventTicketObjectRepository extends ObjectRepository
{
    /**
     * {@inheritDoc}
     */
    protected function getIdentifier(): string
    {
        return EventTicketObject::IDENTIFIER;
    }

    /**
     * {@inheritDoc}
     */
    protected function getResponseClass(): string
    {
        return EventTicketObjectsResponse::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getInstanceClass(): string
    {
        return EventTicketObject::class;
    }
}
