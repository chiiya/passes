<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\DoorsOpenLabel;
use Symfony\Component\Validator\Constraints\Choice;

class EventDateTime extends Component
{
    public function __construct(
        /**
         * Optional.
         * The date/time when the doors open at the venue.
         * ISO 8601 + optional offset.
         */
        #[Cast(ISO8601DateCaster::class)]
        public ?string $doorsOpen = null,
        /**
         * Optional.
         * The date/time when the event starts.
         * ISO 8601 + optional offset.
         */
        #[Cast(ISO8601DateCaster::class)]
        public ?string $start = null,
        /**
         * Optional.
         * The date/time when the event ends.
         * ISO 8601 + optional offset.
         */
        #[Cast(ISO8601DateCaster::class)]
        public ?string $end = null,
        /**
         * Optional.
         * The label to use for the doors open value (doorsOpen) on the card detail view.
         */
        #[Choice([
            DoorsOpenLabel::DOORS_OPEN,
            DoorsOpenLabel::GATES_OPEN,
            DoorsOpenLabel::DOORS_OPEN_LABEL_UNSPECIFIED,
        ])]
        #[Cast(LegacyValueCaster::class, DoorsOpenLabel::class)]
        public ?string $doorsOpenLabel = null,
        /**
         * Optional.
         * A custom label to use for the doors open value (doorsOpen) on the card detail view.
         */
        public ?LocalizedString $customDoorsOpenLabel = null,
    ) {
        parent::__construct();
    }
}
