<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Apple\Enumerators\TransitType;
use Chiiya\Passes\Apple\Traits\HasFields;
use Chiiya\Passes\Apple\Traits\HasGroupingIdentifier;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Arr;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class BoardingPass extends Pass
{
    use HasFields;
    use HasGroupingIdentifier;

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
