<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Common\Casters;

use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Tests\TestCase;
use DateTimeImmutable;
use DateTimeInterface;
use PHPUnit\Framework\Attributes\Group;

class DateCasterTest extends TestCase
{
    #[Group('common')]
    public function test_parses_rfc3339_with_fractional_seconds_and_zulu(): void
    {
        // Regression for #42: the Google Wallet API returns timestamps in this form.
        $date = (new ISO8601DateCaster([]))->unserialize('2023-01-01T12:00:00.000Z');

        $this->assertInstanceOf(DateTimeImmutable::class, $date);
        $this->assertSame('2023-01-01T12:00:00+00:00', $date->format(DateTimeInterface::ATOM));
    }

    #[Group('common')]
    public function test_parses_zulu_and_offset_timestamps(): void
    {
        $caster = new ISO8601DateCaster([]);

        $this->assertSame(
            '2023-01-01T12:00:00+00:00',
            $caster->unserialize('2023-01-01T12:00:00Z')?->format(DateTimeInterface::ATOM),
        );
        $this->assertSame(
            '2020-12-21T00:00:00+01:00',
            $caster->unserialize('2020-12-21T00:00:00+01:00')?->format(DateTimeInterface::ATOM),
        );
    }

    #[Group('common')]
    public function test_returns_null_for_empty_or_unparseable_values(): void
    {
        $caster = new ISO8601DateCaster([]);

        $this->assertNull($caster->unserialize(null));
        $this->assertNull($caster->unserialize(''));
        $this->assertNull($caster->unserialize('not-a-date'));
    }

    #[Group('common')]
    public function test_returns_existing_immutable_instance_as_is(): void
    {
        $value = new DateTimeImmutable('2023-01-01T12:00:00+00:00');

        $this->assertSame($value, (new ISO8601DateCaster([]))->unserialize($value));
    }
}
