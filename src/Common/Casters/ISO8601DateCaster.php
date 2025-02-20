<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use DateTimeInterface;

class ISO8601DateCaster extends DateCaster
{
    protected function format(): string
    {
        return DateTimeInterface::ATOM;
    }
}
