<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Apple\Traits\HasFields;
use Chiiya\Passes\Apple\Traits\HasGroupingIdentifier;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class EventTicket extends Pass
{
    use HasFields;
    use HasGroupingIdentifier;

    public function toArray(): array
    {
        $array = parent::toArray();
        $fields = Arr::only($array, $this->fields());

        return array_merge(Arr::except($array, $this->fields()), [
            'eventTicket' => $fields,
        ]);
    }
}
