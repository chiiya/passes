<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Apple\Traits\HasFields;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class Coupon extends Pass
{
    use HasFields;

    public function toArray(): array
    {
        $array = parent::toArray();
        $fields = Arr::only($array, $this->fields());

        return array_merge(Arr::except($array, $this->fields()), [
            'coupon' => $fields,
        ]);
    }
}
