<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

/**
 * @since iOS v7.0
 */
class Beacon extends Component
{
    public function __construct(
        /**
         * Required.
         * Unique identifier of a Bluetooth Low Energy location beacon.
         */
        #[NotBlank]
        public string $proximityUUID,
        /**
         * Optional.
         * Major identifier of a Bluetooth Low Energy location beacon.
         */
        #[Range(min: 0, max: 65535)]
        public ?int $major = null,
        /**
         * Optional.
         * Minor identifier of a Bluetooth Low Energy location beacon.
         */
        #[Range(min: 0, max: 65535)]
        public ?int $minor = null,
        /**
         * Optional.
         * Text displayed on the lock screen when the pass is currently relevant.
         */
        public ?string $relevantText = null,
    ) {
        parent::__construct();
    }
}
