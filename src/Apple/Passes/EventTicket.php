<?php

namespace Chiiya\LaravelPasses\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Traits\HasFields;
use Chiiya\LaravelPasses\Apple\Traits\HasGroupingIdentifier;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class EventTicket extends Pass
{
    use HasFields, HasGroupingIdentifier;

    public function toArray(): array
    {
        $array = parent::toArray();
        $fields = Arr::only($array, $this->fields());

        return array_merge(Arr::except($array, $this->fields()), [
            'eventTicket' => $fields,
        ]);
    }
}
