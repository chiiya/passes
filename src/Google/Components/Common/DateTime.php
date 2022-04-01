<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\CastWith;

class DateTime extends Component
{
    /**
     * Required.
     * An ISO 8601 extended format date/time with optional offset.
     */
    #[Required]
    #[CastWith(ISO8601DateCaster::class)]
    public ?string $date;
}
