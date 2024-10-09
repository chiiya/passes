<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use DateTimeInterface;

class W3CDateCaster extends DateCaster
{
    protected function format(): string
    {
        return DateTimeInterface::W3C;
    }
}
