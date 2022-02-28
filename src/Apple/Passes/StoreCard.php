<?php

namespace Chiiya\LaravelPasses\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Traits\HasFields;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class StoreCard extends Pass
{
    use HasFields;

    public function toArray(): array
    {
        $array = parent::toArray();
        $fields = Arr::only($array, $this->fields());

        return array_merge(Arr::except($array, $this->fields()), [
            'storeCard' => $fields,
        ]);
    }
}
