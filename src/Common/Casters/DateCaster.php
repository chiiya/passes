<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

abstract class DateCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?DateTimeImmutable
    {
        if ($value instanceof DateTimeImmutable) {
            return $value;
        }

        if (! is_string($value) || $value === '') {
            return null;
        }

        // Parse permissively: the Google Wallet API returns RFC3339 timestamps with
        // fractional seconds and a 'Z' suffix (e.g. 2023-01-01T12:00:00.000Z) that a
        // strict createFromFormat() against ATOM/W3C cannot match.
        try {
            return new DateTimeImmutable($value);
        } catch (Exception) {
            return null;
        }
    }

    public function serialize(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format($this->format());
        }

        return (string) $value;
    }

    abstract protected function format(): string;
}
