<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class WifiNetwork extends Component
{
    public function __construct(
        /**
         * Required.
         * The password for the WiFi network.
         */
        #[NotBlank]
        public string $password,
        /**
         * Required.
         * The name for the WiFi network.
         */
        #[NotBlank]
        public string $ssid,
    ) {
        parent::__construct();
    }
}
