<?php

namespace Chiiya\LaravelPasses\Apple\Passes;

use Chiiya\LaravelPasses\Apple\Enumerators\TransitType;
use Chiiya\LaravelPasses\Apple\Traits\HasFields;
use Chiiya\LaravelPasses\Apple\Traits\HasGroupingIdentifier;
use Chiiya\LaravelPasses\Common\Validation\Required;
use Chiiya\LaravelPasses\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class BoardingPass extends Pass
{
    use HasFields, HasGroupingIdentifier;

    /**
     * Required.
     * Type of transit.
     *
     * @see TransitType
     */
    #[Required]
    #[ValueIn([TransitType::AIR, TransitType::BOAT, TransitType::BUS, TransitType::TRAIN, TransitType::GENERIC])]
    public ?string $transitType;

    public function toArray(): array
    {
        $array = parent::toArray();
        $keys = array_merge($this->fields(), ['transitType']);
        $fields = Arr::only($array, $keys);

        return array_merge(Arr::except($array, $keys), [
            'boardingPass' => $fields,
        ]);
    }
}
