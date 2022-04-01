<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\NumberBetween;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\Strict;

/**
 * @since iOS v7.0
 */
#[Strict]
class Beacon extends Component
{
    /**
     * Optional.
     * Major identifier of a Bluetooth Low Energy location beacon.
     */
    #[NumberBetween(0, 65535)]
    public ?int $major;

    /**
     * Optional.
     * Minor identifier of a Bluetooth Low Energy location beacon.
     */
    #[NumberBetween(0, 65535)]
    public ?int $minor;

    /**
     * Required.
     * Unique identifier of a Bluetooth Low Energy location beacon.
     */
    #[Required]
    public ?string $proximityUUID;

    /**
     * Optional.
     * Text displayed on the lock screen when the pass is currently relevant.
     */
    public ?string $relevantText;
}
