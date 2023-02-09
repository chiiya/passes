<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Passes\AbstractClass;
use Chiiya\Passes\Google\Passes\AbstractObject;

abstract class BaseRepository
{
    /** @var string */
    final public const BASE_URL = 'https://walletobjects.googleapis.com/walletobjects/v1/';

    public function __construct(
        protected ClientInterface $client,
    ) {}

    /**
     * Get details for a single instance.
     */
    final public function get(string $id): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->get($this->buildEntityUrl($id));

        return new $class($response);
    }

    /**
     * Create a new instance of $instance.
     */
    final public function create(Component $instance): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->post($this->buildResourceUrl(), $instance);

        return new $class($response);
    }

    /**
     * Update an instance.
     */
    final public function update(AbstractClass|AbstractObject $instance): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->put($this->buildEntityUrl($instance->id), $instance);

        return new $class($response);
    }

    /**
     * Get the resource URL identifier.
     */
    abstract protected function getIdentifier(): string;

    /**
     * Get the response class name.
     */
    abstract protected function getResponseClass(): string;

    /**
     * Get the instance class name.
     */
    abstract protected function getInstanceClass(): string;

    protected function buildResourceUrl(): string
    {
        return self::BASE_URL.$this->getIdentifier();
    }

    protected function buildEntityUrl(string $id): string
    {
        return self::BASE_URL.$this->getIdentifier().'/'.$id;
    }
}
