<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Passes\OfferObject;
use Chiiya\Passes\Google\Repositories\OfferObjectRepository;
use Chiiya\Passes\Tests\Google\Fixtures\Passes;
use Chiiya\Passes\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

class OfferObjectTest extends TestCase
{
    use MocksApiRequests;

    #[Group('google')]
    public function test_list_instances(): void
    {
        $client = $this->createMockClient('offer-objects');
        $repository = new OfferObjectRepository($client);
        $response = $repository->index('1234567890123456789.coupon-15');
        $this->assertSame(1, $response->pagination->resultsPerPage);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->resources[0]->id);
        $instance = (new OfferObject(...Passes::offerObject()))->jsonSerialize();
        $this->assertSameArray($instance, $response->resources[0]->jsonSerialize());
    }

    #[Group('google')]
    public function test_get_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $repository = new OfferObjectRepository($client);
        $response = $repository->get('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665');
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $instance = (new OfferObject(...Passes::offerObject()))->jsonSerialize();
        $this->assertSameArray($instance, $response->jsonSerialize());
    }

    #[Group('google')]
    public function test_create_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $repository = new OfferObjectRepository($client);
        $instance = new OfferObject(...Passes::offerObject());
        $response = $repository->create($instance);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }

    #[Group('google')]
    public function test_update_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $repository = new OfferObjectRepository($client);
        $instance = new OfferObject(...Passes::offerObject());
        $response = $repository->update($instance);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }
}
