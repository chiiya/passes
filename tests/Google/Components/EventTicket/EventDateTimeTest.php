<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Google\Components\EventTicket;

use Chiiya\Passes\Google\Components\EventTicket\EventDateTime;
use Chiiya\Passes\Tests\TestCase;
use DateTimeImmutable;
use PHPUnit\Framework\Attributes\Group;

class EventDateTimeTest extends TestCase
{
    #[Group('google')]
    public function test_decodes_iso8601_date_strings_into_dates(): void
    {
        // Regression for #41: the ISO8601DateCaster returns a DateTimeImmutable, which
        // could not be assigned to the previously ?string-typed properties.
        $component = EventDateTime::decode([
            'doorsOpen' => '2023-01-01T12:00:00+00:00',
            'start' => '2023-01-01T13:00:00+00:00',
            'end' => '2023-01-01T15:00:00+00:00',
        ]);

        $this->assertInstanceOf(DateTimeImmutable::class, $component->doorsOpen);
        $this->assertInstanceOf(DateTimeImmutable::class, $component->start);
        $this->assertInstanceOf(DateTimeImmutable::class, $component->end);
    }

    #[Group('google')]
    public function test_serializes_dates_back_to_iso8601_strings(): void
    {
        $attributes = [
            'doorsOpen' => '2023-01-01T12:00:00+00:00',
            'start' => '2023-01-01T13:00:00+00:00',
            'end' => '2023-01-01T15:00:00+00:00',
        ];

        $this->assertSameArray($attributes, EventDateTime::decode($attributes)->jsonSerialize());
    }

    #[Group('google')]
    public function test_accepts_plain_date_strings_on_construction(): void
    {
        $component = new EventDateTime(start: '2023-01-01T13:00:00+00:00');

        $this->assertSame('2023-01-01T13:00:00+00:00', $component->encode()['start']);
    }
}
