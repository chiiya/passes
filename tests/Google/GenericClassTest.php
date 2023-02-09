<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Passes\GenericClass;
use Chiiya\Passes\Google\Repositories\GenericClassRepository;
use Chiiya\Passes\Tests\Google\Fixtures\Passes;
use Chiiya\Passes\Tests\TestCase;

class GenericClassTest extends TestCase
{
    use MocksApiRequests;

    public function test_list_instances(): void
    {
        $client = $this->createMockClient('generic-classes');
        $repository = new GenericClassRepository($client);
        $response = $repository->index('1234567891234567891');
        $this->assertSame(1, $response->pagination->resultsPerPage);
        $this->assertSame('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002', $response->resources[0]->id);
        $instance = (new GenericClass(Passes::genericClass()))->jsonSerialize();
        $this->assertSameArray($instance, $response->resources[0]->jsonSerialize());
    }

    public function test_get_instance(): void
    {
        $client = $this->createMockClient('generic-class');
        $repository = new GenericClassRepository($client);
        $response = $repository->get('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002');
        $this->assertSame('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002', $response->id);
        $instance = (new GenericClass(Passes::genericClass()))->jsonSerialize();
        $this->assertSameArray($instance, $response->jsonSerialize());
    }

    public function test_create_instance(): void
    {
        $client = $this->createMockClient('generic-class');
        $repository = new GenericClassRepository($client);
        $instance = new GenericClass(Passes::genericClass());
        $response = $repository->create($instance);
        $this->assertSame('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }

    public function test_update_instance(): void
    {
        $client = $this->createMockClient('generic-class');
        $repository = new GenericClassRepository($client);
        $instance = new GenericClass(Passes::genericClass());
        $response = $repository->update($instance);
        $this->assertSame('1234567891234567891.718bf4ae-a7a5-11ed-afa1-0242ac120002', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }
}
