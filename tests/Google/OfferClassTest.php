<?php

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Passes\OfferClass;
use Chiiya\Passes\Google\Repositories\OfferClassRepository;
use Chiiya\Passes\Tests\Google\Fixtures\Passes;
use Chiiya\Passes\Tests\TestCase;

class OfferClassTest extends TestCase
{
    use MocksApiRequests;

    public function test_list_instances(): void
    {
        $client = $this->createMockClient('offer-classes');
        $repository = new OfferClassRepository($client);
        $response = $repository->index('1234567890123456789');
        $this->assertSame(1, $response->pagination->resultsPerPage);
        $this->assertSame('1234567890123456789.coupon-15', $response->resources[0]->id);
        $instance = (new OfferClass(Passes::offerClass()))->jsonSerialize();
        $this->assertSameArray($instance, $response->resources[0]->jsonSerialize());
    }

    public function test_get_instance(): void
    {
        $client = $this->createMockClient('offer-class');
        $repository = new OfferClassRepository($client);
        $response = $repository->get('1234567890123456789.coupon-15');
        $this->assertSame('1234567890123456789.coupon-15', $response->id);
        $instance = (new OfferClass(Passes::offerClass()))->jsonSerialize();
        $this->assertSameArray($instance, $response->jsonSerialize());
    }

    public function test_create_instance(): void
    {
        $client = $this->createMockClient('offer-class');
        $repository = new OfferClassRepository($client);
        $instance = new OfferClass(Passes::offerClass());
        $response = $repository->create($instance);
        $this->assertSame('1234567890123456789.coupon-15', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }

    public function test_update_instance(): void
    {
        $client = $this->createMockClient('offer-class');
        $repository = new OfferClassRepository($client);
        $instance = new OfferClass(Passes::offerClass());
        $response = $repository->update($instance);
        $this->assertSame('1234567890123456789.coupon-15', $response->id);
        $this->assertSameArray($instance->jsonSerialize(), $response->jsonSerialize());
    }
}
