<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Passes\GenericObject;
use Chiiya\Passes\Google\Repositories\GenericObjectRepository;
use Chiiya\Passes\Tests\Google\Fixtures\Passes;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class GenericObjectTest extends TestCase
{
    use MocksApiRequests;

    #[Group('google')]
    public function test_list_instances(): void
    {
        $client = $this->createMockClient('generic-objects');
        $repository = new GenericObjectRepository($client);
        $response = $repository->index('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002');
        $this->assertSame(1, $response->pagination->resultsPerPage);
        $this->assertSame('1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002', $response->resources[0]->id);
        $instance = (new GenericObject(...Passes::genericObject()))->jsonSerialize();
        $this->assertSameArray($instance, $response->resources[0]->jsonSerialize());
    }

    #[Group('google')]
    public function test_get_instance(): void
    {
        $client = $this->createMockClient('generic-object');
        $repository = new GenericObjectRepository($client);
        $response = $repository->get('1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002');
        $this->assertSame('1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002', $response->id);
        $instance = (new GenericObject(...Passes::genericObject()))->jsonSerialize();
        $this->assertSameArray($instance, $response->jsonSerialize());
    }

    #[Group('google')]
    public function test_create_instance(): void
    {
        $client = $this->createMockClient('generic-object');
        $repository = new GenericObjectRepository($client);
        $instance = new GenericObject(...Passes::genericObject());
        $response = $repository->create($instance);
        $this->assertSame('1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }

    #[Group('google')]
    public function test_update_instance(): void
    {
        $client = $this->createMockClient('generic-object');
        $repository = new GenericObjectRepository($client);
        $instance = new GenericObject(...Passes::genericObject());
        $response = $repository->update($instance);
        $this->assertSame('1234567891234567891.fb1e9730-a83b-11ed-afa1-0242ac120002', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }
}
