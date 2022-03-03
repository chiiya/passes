<?php

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Factories\OfferPassFactory;
use Chiiya\Passes\Google\Passes\OfferObject;
use Chiiya\Passes\Tests\Google\Fixtures\Passes;
use Chiiya\Passes\Tests\TestCase;

class OfferObjectTest extends TestCase
{
    use MocksApiRequests;

    public function test_list_instances(): void
    {
        $client = $this->createMockClient('offer-objects');
        $factory = new OfferPassFactory($client);
        $response = $factory->objects()->index('1234567890123456789.coupon-15');
        $this->assertSame(1, $response->pagination->resultsPerPage);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->resources[0]->id);
        $instance = OfferObject::create(Passes::offerObject())->jsonSerialize();
        $this->assertSameArray($instance, $response->resources[0]->jsonSerialize());
    }

    public function test_get_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $factory = new OfferPassFactory($client);
        $response = $factory->objects()->get('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665');
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $instance = OfferObject::create(Passes::offerObject())->jsonSerialize();
        $this->assertSameArray($instance, $response->jsonSerialize());
    }

    public function test_create_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $factory = new OfferPassFactory($client);
        $instance = OfferObject::create(Passes::offerObject());
        $response = $factory->objects()->create($instance);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }

    public function test_update_instance(): void
    {
        $client = $this->createMockClient('offer-object');
        $factory = new OfferPassFactory($client);
        $instance = OfferObject::create(Passes::offerObject());
        $response = $factory->objects()->update($instance);
        $this->assertSame('1234567890123456789.002e4fb7-1c92-47cc-873f-46dba4a1b665', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }
}
