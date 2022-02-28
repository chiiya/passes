<?php

namespace Chiiya\LaravelPasses\Apple\Components;

use Chiiya\LaravelPasses\Common\Component;
use Chiiya\LaravelPasses\Common\Validation\Required;
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
