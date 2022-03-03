<?php

namespace Chiiya\Passes\Google\Factories;

use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\JWT;
use Chiiya\Passes\Google\Repositories\ClassRepositoryInterface;
use Chiiya\Passes\Google\Repositories\ObjectRepositoryInterface;
use InvalidArgumentException;

abstract class BaseFactory
{
    protected ClassRepositoryInterface $classRepository;

    protected ObjectRepositoryInterface $objectRepository;

    /**
     * Service account configuration.
     */
    private array $config = [];

    public function __construct(
        protected ClientInterface $client
    ) {
    }

    /**
     * Parse service account config from JSON file.
     *
     * @return BaseFactory
     */
    final public function parseConfig(string $path): static
    {
        if (! file_exists($path)) {
            throw new InvalidArgumentException(sprintf('Service account configuration file not found: %s', $path));
        }
        $config = json_decode(file_get_contents($path), true);

        $this->config['client_id'] = $config['client_id'];
        $this->config['client_email'] = $config['client_email'];
        $this->config['private_key'] = $config['private_key'];
        $this->config['signing_algorithm'] = 'HS256';
        $this->client->setConfig($this->config);

        return $this;
    }

    /**
     * Create JWT instance.
     */
    final public function createJWT(array $attributes = []): JWT
    {
        return new JWT(array_merge([
            'iss' => $this->config['client_email'],
            'key' => $this->config['private_key'],
        ], $attributes));
    }

    final public function classes(): ClassRepositoryInterface
    {
        return $this->classRepository;
    }

    final public function objects(): ObjectRepositoryInterface
    {
        return $this->objectRepository;
    }
}
