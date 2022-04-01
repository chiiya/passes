<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class WifiNetwork extends Component
{
    /**
     * Required.
     * The password for the WiFi network.
     */
    #[Required]
    public ?string $password;

    /**
     * Required.
     * The name for the WiFi network.
     */
    #[Required]
    public ?string $ssid;
}
