<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Common\ArrayHelper;

class EventTicket extends Pass
{
    public function __construct(
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
        $fields = ArrayHelper::only($array, $this->fields());

        return array_merge(ArrayHelper::except($array, $this->fields()), [
            'eventTicket' => $fields,
        ]);
    }
}
