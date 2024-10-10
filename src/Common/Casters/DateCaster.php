<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use DateTimeImmutable;
use DateTimeInterface;

abstract class DateCaster implements CastsProperty
{
    public function unserialize(mixed $value): ?DateTimeImmutable
    {
        if ($value === null) {
            return null;
        }

        $date = DateTimeImmutable::createFromFormat($this->format(), $value);

        if ($date === false) {
            return null;
        }

        return $date;
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
