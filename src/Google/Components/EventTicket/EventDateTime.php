<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\EventTicket;

use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\ValueIn;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Enumerators\DoorsOpenLabel;
use Spatie\DataTransferObject\Attributes\CastWith;

class EventDateTime extends Component
{
    /**
     * Optional.
     * The date/time when the doors open at the venue.
     * ISO 8601 + optional offset.
     */
    #[CastWith(ISO8601DateCaster::class)]
    public ?string $doorsOpen;

    /**
     * Optional.
     * The date/time when the event starts.
     * ISO 8601 + optional offset.
     */
    #[CastWith(ISO8601DateCaster::class)]
    public ?string $start;

    /**
     * Optional.
     * The date/time when the event ends.
     * ISO 8601 + optional offset.
     */
    #[CastWith(ISO8601DateCaster::class)]
    public ?string $end;

    /**
     * Optional.
     * The label to use for the doors open value (doorsOpen) on the card detail view.
     */
    #[ValueIn([DoorsOpenLabel::DOORS_OPEN, DoorsOpenLabel::GATES_OPEN, DoorsOpenLabel::DOORS_OPEN_LABEL_UNSPECIFIED])]
    #[CastWith(LegacyValueCaster::class, DoorsOpenLabel::class)]
    public ?string $doorsOpenLabel;

    /**
     * Optional.
     * A custom label to use for the doors open value (doorsOpen) on the card detail view.
     */
    public ?LocalizedString $customDoorsOpenLabel;
}
