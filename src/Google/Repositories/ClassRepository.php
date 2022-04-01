<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;

abstract class ClassRepository extends BaseRepository implements ClassRepositoryInterface
{
    /**
     * Get a list of all instances, filtered by issuer id.
     */
    final public function index(string $issuerId, array $parameters = []): Component
    {
        $url = $this->buildResourceUrl().'?'.http_build_query(array_merge([
            'issuerId' => $issuerId,
        ], $parameters));
        /** @var Component $class */
        $class = $this->getResponseClass();
        $response = $this->client->get($url);

        return new $class($response);
    }
}
