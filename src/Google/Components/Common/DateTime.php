<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\ISO8601DateCaster;
use Chiiya\Passes\Common\Component;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class DateTime extends Component
{
    public function __construct(
        /**
         * Required.
         * An ISO 8601 extended format date/time with optional offset.
         */
        #[NotBlank]
        #[Cast(ISO8601DateCaster::class)]
        public DateTimeInterface|string $date,
    ) {
        parent::__construct();
    }
}
