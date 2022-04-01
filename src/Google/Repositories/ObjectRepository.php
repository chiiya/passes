<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;

abstract class ObjectRepository extends BaseRepository implements ObjectRepositoryInterface
{
    /**
     * Get a list of all instances, filtered by class id.
     */
    final public function index(string $classId, array $parameters = []): Component
    {
        $url = $this->buildResourceUrl().'?'.http_build_query(array_merge([
            'classId' => $classId,
        ], $parameters));
        /** @var Component $class */
        $class = $this->getResponseClass();
        $response = $this->client->get($url);

        return new $class($response);
    }
}
