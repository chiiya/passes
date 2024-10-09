<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Apple\Enumerators\TransitType;
use Chiiya\Passes\Common\ArrayHelper;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class BoardingPass extends Pass
{
    public function __construct(
        /**
         * Required.
         * Type of transit.
         *
         * @see TransitType
         */
        #[NotBlank]
        #[Choice([TransitType::AIR, TransitType::BOAT, TransitType::BUS, TransitType::TRAIN, TransitType::GENERIC])]
        public string $transitType,
        /**
         * Optional.
         * Identifier used to group related passes. If a grouping identifier is specified, passes with the same style,
         * pass type identifier, and grouping identifier are displayed as a group. Otherwise, passes are grouped
         * automatically.
         */
        public ?string $groupingIdentifier = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }

    public function encode(): array
    {
        $array = parent::encode();
        $keys = array_merge($this->fields(), ['transitType']);
        $fields = ArrayHelper::only($array, $keys);

        return array_merge(ArrayHelper::except($array, $keys), [
            'boardingPass' => $fields,
        ]);
    }
}
